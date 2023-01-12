<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [ [
            'product_type' => 'SEO Blog',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'SEO Website',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Resume',
            'per_word_credit' => 1.2,
        ],
        [
            'product_type' => 'Line by Line Editing',
            'per_word_credit' => 0.2,
        ],
        [
            'product_type' => 'Developmental Editing',
            'per_word_credit' => 0.5,
        ],
        [
            'product_type' => 'Non-Research Writing',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Research Writing',
            'per_word_credit' => 1.2,
        ],
        [
            'product_type' => 'Detailed Formatting',
            'per_word_credit' => 0.05,
        ],
        [
            'product_type' => 'Notebility Reports',
            'per_word_credit' => 12,
        ],
        [
            'product_type' => 'Noteability articles',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Wikipedia Drafts',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Webcopy',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Blogs',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Articles',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Press Release',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Business Plan',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'LinkedIn',
            'per_word_credit' => 1,
        ],
        [
            'product_type' => 'Cover Letter',
            'per_word_credit' => 1,
        ],
    ];


    foreach ($products as $product) {
        $create = ProductType::create($product);
    }

    }
}
