<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'deadline', // Added deadline to allow mass assignment
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'deadline' => 'datetime', // Ensure deadline is treated as a datetime instance
    ];
}
