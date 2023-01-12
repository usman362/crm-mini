<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class ContentDetail extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'date',
        'task_id',
        'client',
        'link',
        'product_type',
        'per_word_credit',
        'expected_word_count',
        'writer_word_count',
        'writer_word_converted',
        'writer_flag',
        'editor_assigned',
        'editor_word_count',
        'editor_flag',
        'plagiarism',
        'approval',
        'client_feedback',
        'clarity_tab', 
        'user_id',  
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type', 'id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class,'task_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assign(){
        return $this->hasOne(User::class,'id','editor_assigned');
    }

    public function clients(){
        return $this->hasOne(Client::class,'id','client');
    }
}
