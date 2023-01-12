<?php

namespace App\Exports;

use App\Models\ContentDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ContentDetailExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ContentDetail::with('productType')->get();
    }

    public function map($content): array
    {
      return [
        $content->id,
        $content->date,
        $content->task_id,
        $content->client,
        $content->link,
        $content->productType->product_type ?? '',
        $content->productType->per_word_credit ?? '', //per word credit
        $content->expected_word_count,
        $content->writer_word_count,
        (float)$content->productType->per_word_credit * (float)$content->writer_word_count, //writer word converted
        $content->writer_flag,
        $content->editor_assigned,
        $content->editor_word_count,
        $content->editor_flag,
        $content->plagiarism,
        $content->approval,
        $content->client_feedback,
        $content->clarity_tab
      ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Date',
            'Task Id',
            'Client',
            'Link',
            'Product Type',
            'Per Word Credit',
            'Expected Word Count',
            'Writer Word Count',
            'Writer Word Converted',
            'Writer Flag',
            'Editor Assigned',
            'Editor Word Count',
            'Editor Flag',
            'Plagiarism',
            'Approval',
            'Client Feedback',
            'Clarity Tab',  
        ];
    }

    
}
