<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'category',
        'date',
        'image',
        'slug',
        'author',
        'status',
        'featured',
        'views',
        'meta_description',
        'tags',
    ];

    protected $casts = [
        'date' => 'date',
        'featured' => 'boolean',
        'tags' => 'array',
    ];
}
