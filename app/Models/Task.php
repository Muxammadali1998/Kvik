<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
    ];

    const IMAGE_PATH = '/images/tasks';
}
