<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnershipOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'benefits',
        'requirements',
        'contact_person',
    ];

    protected $casts = [
        'benefits' => 'array',
        'requirements' => 'array',
    ];
}
