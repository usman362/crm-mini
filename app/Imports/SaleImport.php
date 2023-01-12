<?php

namespace App\Imports;
use App\Models\Sale;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SaleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sale([
            'payment_mode' => $row[1] ?? '',
            'source' => $row[2] ?? '',
            'category' => $row[3] ?? '',
            'brand' => $row[4] ?? '',
            'region' => $row[5] ?? '',
            'name' => $row[6] ?? '',
            'number' => $row[7] ?? '',
            'email' => $row[8] ?? '',
            'product' => $row[9] ?? '',
            'service' => $row[10] ?? '',
            'gross_sale' => $row[11] ?? '',
            'cash_in_hand' => $row[12] ?? '',
            'cash_in_gbp' => $row[13] ?? '',
            'sales_person' => $row[14] ?? '',
            'sales_date' => $row[15] ?? '',
            'account_manager' => $row[16] ?? '',
        ]);
    }
}
