<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const USERTYPES = ['user', 'manager', 'admin'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'sexe',
        'usertype',
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
     * Vérifie si un usertype est valide.
     *
     * @param string $usertype
     * @return bool
     */
    public static function isValidUsertype(string $usertype): bool
    {
        return in_array($usertype, self::USERTYPES);
    }

    // Relations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function superadmin()
    {
        return $this->hasOne(Superadmin::class);
    }

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
}
