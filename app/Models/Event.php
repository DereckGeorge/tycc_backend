<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'end_date',
        'time',
        'end_time',
        'location',
        'attendees_limit',
        'registered_attendees',
        'price',
        'currency',
        'category',
        'featured',
        'registration_open',
        'registration_deadline',
        'full_description',
        'address',
        'image',
        'agenda',
        'speakers',
        'sponsors',
        'requirements',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'end_date' => 'date',
        'featured' => 'boolean',
        'registration_open' => 'boolean',
        'registration_deadline' => 'date',
        'agenda' => 'array',
        'speakers' => 'array',
        'sponsors' => 'array',
        'requirements' => 'array',
    ];
}
