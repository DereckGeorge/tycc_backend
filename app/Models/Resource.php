<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'category',
        'file_path',
        'file_size',
        'file_size_formatted',
        'download_count',
        'featured',
        'status',
        'access_level',
        'tags',
        'version',
        'language',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'tags' => 'array',
    ];
}
