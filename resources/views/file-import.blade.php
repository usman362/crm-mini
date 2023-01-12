<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel 8|7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5 text-center">
        <h2 class="mb-4">
           Add Record
        </h2>

        <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="margin: 0 auto;">
                <div class="row">
                    <div class="col-md-2">
                        <label>Payment Mode</label>
                        <input type="text" class="form-control" name="payment_mode">
                    </div>
                    <div class="col-md-2">
                        <label>Source</label>
                        <input type="text" class="form-control" name="source">
                    </div>
                    <div class="col-md-2">
                        <label>Category</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                    <div class="col-md-2">
                        <label>Brand</label>
                        <input type="text" class="form-control" name="brand">
                    </div>
                    <div class="col-md-2">
                        <label>Region</label>
                        <input type="text" class="form-control" name="region">
                    </div>
                    <div class="col-md-2">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-2">
                        <label>Number</label>
                        <input type="text" class="form-control" name="number">
                    </div>
                    <div class="col-md-2">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="col-md-2">
                        <label>Product</label>
                        <input type="text" class="form-control" name="product">
                    </div>
                    <div class="col-md-2">
                        <label>Service</label>
                        <input type="text" class="form-control" name="service">
                    </div>
                    <div class="col-md-2">
                        <label>Gross Sale</label>
                        <input type="text" class="form-control" name="gross_sale">
                    </div>
                    <div class="col-md-2">
                        <label>Cash In Hand</label>
                        <input type="text" class="form-control" name="cash_in_hand">
                    </div>
                    <div class="col-md-2">
                        <label>Cash In GBP</label>
                        <input type="text" class="form-control" name="cash_in_gbp">
                    </div>
                    <div class="col-md-2">
                        <label>Sales Person</label>
                        <input type="text" class="form-control" name="sales_person">
                    </div>
                    <div class="col-md-2">
                        <label>Sales Date</label>
                        <input type="date" class="form-control" name="sales_date">
                    </div>
                    <div class="col-md-2">
                        <label>Account Manager</label>
                        <input type="text" class="form-control" name="account_manager">
                    </div>
                    <div class="col-md-4 mt-4 text-left">
                        <button type="submit" class="btn btn-primary">Add data</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="container mt-5 text-center">
            <h2 class="mb-4">
                Import CSV
            </h2>

        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
            <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
        </form>
    </div>




    <div class="container mt-4">
        <table class="table yajra-datatable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Payment Mode</th>
                    <th>Source</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Region</th>
                    <th>Name</th>
                    <th>Number</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {

    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('sale.listing') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'payment_mode', name: 'payment_mode'},
            {data: 'source', name: 'source'},
            {data: 'category', name: 'category'},
            {data: 'brand', name: 'brand'},
            {data: 'region', name: 'region'},
            {data: 'name', name: 'name'},
            {data: 'number', name: 'number'},
        ]
    });

  });
</script>

</html>
