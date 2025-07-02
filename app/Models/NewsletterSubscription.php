<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsletterSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'email',
        'name',
        'interests',
        'frequency',
        'status',
    ];

    protected $casts = [
        'interests' => 'array',
    ];
}
