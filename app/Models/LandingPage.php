<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = 'landing_page';
    protected $casts = [
        'content' => 'array',
        'isActive' => 'boolean'
    ];
}
