<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpreadSheet extends Model
{
    use HasFactory;


    public function assignTo()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    public function assignBy()
    {
        return $this->belongsTo(User::class, 'assign_by');
    }
}
