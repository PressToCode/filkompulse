<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, CanResetPassword;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function googleAccountAuth(): HasOne
    {
        return $this->hasOne(GoogleAccountAuth::class, 'user_id', 'id');
    }
    
    public function keranjang(): HasOne
    {
        // Assumed to have user_id as foreign key in keranjang
        return $this->hasOne(Keranjang::class, 'user_id', 'id');
    }

    public function verified_user(): HasMany
    {
        return $this->hasMany(Verified_user::class, 'user_id', 'id');
    }

    public function reminder(): HasMany
    {
        return $this->hasMany(Reminder::class, 'user_id', 'id');
    }
}
