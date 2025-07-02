<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'category',
        'description',
        'partnership_details',
        'website',
        'partnership_since',
        'status',
        'featured',
        'partnership_type',
        'contact_person',
        'contact_email',
        'services_provided',
        'sectors_focus',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'services_provided' => 'array',
        'sectors_focus' => 'array',
    ];
}
