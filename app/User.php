<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'lastName', 'dateBirth', 'phone', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    public function pregones()
    {
        return
            $this
                ->belongsToMany('\App\Pregon','usuario_pregon')
                ->withPivot('nombre', 'celular', 'edad', 'sexo', 'donde_lo_conoces',
                    'interesado', 'why', 'comentarios', 'ubicacion', 'latitud', 'longitud', 'photo', 'audio1', 'audio2', 'video');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isSupeAdmin()
    {
        return ($this->role->id == 1);
    }
}
