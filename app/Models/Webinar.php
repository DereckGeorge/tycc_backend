<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'date',
        'speaker',
        'video_url',
        'thumbnail',
        'views',
        'featured',
        'full_description',
        'time',
        'speaker_bio',
        'status',
        'registration_required',
        'max_attendees',
        'registered_attendees',
        'tags',
        'resources',
    ];

    protected $casts = [
        'date' => 'date',
        'featured' => 'boolean',
        'registration_required' => 'boolean',
        'tags' => 'array',
        'resources' => 'array',
    ];
}
