@extends('layouts.control-panel')

@section('content')
    <div class="card">
        <div class="card-head">
            <h1 class="mt-1">@yield('title')</h1>
        </div>
        <div class="card-body">
            <!-- <hr> -->
            <form class="mt-4" method="POST" action="@yield('action')">
                @csrf
                @yield('method')
                @yield('input-fields')
                @yield('submit-button')
            </form>
        </div>
    </div>
@endsection
