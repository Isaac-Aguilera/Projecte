<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $nick
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $image
 * @property string $role
 * @property string $updated_at
 * @property string $created_at
 * @property Producte[] $productes
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Users';

    /**
     * @var array
     */
    protected $fillable = ['name', 'surname', 'nick', 'email', 'password', 'remember_token', 'image', 'role', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productes()
    {
        return $this->hasMany('App\Models\Producte', 'user_id');
    }
}
