<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
            'two_factor_expires_at' => 'datetime',
            'expira_codigo' => 'datetime',
        ];
    }

    /**
     * Accesor para el atributo status.
     * Si el usuario es admin, siempre retorna 'activo'.
     */
    public function getStatusAttribute($value)
    {
        if ($this->role === 'admin') {
            return 'activo';
        }
        return $value ?? 'activo';
    }

    public function carritos()
    {
        return $this->hasMany(Carrito::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
