<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'blog';

    protected $casts = [
        'isActive' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFormattedDate()
    {
        return $this->published_at->isoFormat('D MMM Y');
    }

    public function shortBody(): string
    {
        return Str::words(strip_tags($this->body), 10, '...');
    }
}
