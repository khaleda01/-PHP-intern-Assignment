<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'title', 
        'description', 
        'completed'
    ];
}
