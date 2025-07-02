<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'full_description',
        'category',
        'duration',
        'participants',
        'icon',
        'features',
        'requirements',
        'next_intake',
        'location',
        'cost',
        'status',
        'featured',
    ];

    protected $casts = [
        'features' => 'array',
        'requirements' => 'array',
        'next_intake' => 'date',
    ];
}
