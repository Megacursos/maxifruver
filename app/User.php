<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email',
        'usuario',
        'password',
        'condicion',
        'idrol',
        'imagen'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol(){

        return $this->belongsTo('App\Rol');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
