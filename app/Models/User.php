<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;


class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    public function portofolio(): HasMany
    {
        return $this->hasMany(Portofolio::class, 'portofolio_id');
    }

    public function slider(): HasMany
    {
        return $this->hasMany(Slider::class, 'slider_id');
    }

    public function display(): HasMany
    {
        return $this->hasMany(Display::class, 'display_id');
    }

    public function service(): HasMany
    {
        return $this->hasMany(Service::class, 'service_id');
    }

    public function blog(): HasMany
    {
        return $this->hasMany(Blog::class, 'blog_id');
    }

    public function market(): HasMany
    {
        return $this->hasMany(Market::class, 'market_id');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return Str::contains($this->email, ['@', '.com']);
    }
}
