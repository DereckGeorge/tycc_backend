<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'company',
        'testimonial',
        'avatar',
        'rating',
        'program_id',
        'status',
        'featured',
        'video_testimonial',
        'linkedin_profile',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
