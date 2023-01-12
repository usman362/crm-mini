<?php

namespace App\Imports;
use App\Models\ContentDetail;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContentDetailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $productType = ProductType::where('product_type',$row[5])->first();
       if (isset($productType)) {
        return new ContentDetail([
            'date' => $row[1] ?? '',
            'client' => $row[3] ?? '',
            'link' => $row[4] ?? '',
            'product_type' => $productType->id ?? '',
            'expected_word_count' => $row[7] ?? '',
            'writer_word_count' => $row[8] ?? '',
            'writer_flag' => $row[10] ?? '',
            'editor_assigned' => $row[11] ?? '',
            'editor_word_count' => $row[12] ?? '',
            'editor_flag' => $row[13] ?? '',
            'plagiarism' => $row[14] ?? '',
            'approval' => $row[15] ?? '',
            'client_feedback' => $row[16] ?? '',
            'clarity_tab' => $row[17] ?? '',  
        ]);
       }
        
    }
}
