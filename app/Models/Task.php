<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'deadline', 
        'task_created_date', 
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'deadline' => 'datetime', 
        'task_created_date' => 'datetime', // Add this
    ];
}
