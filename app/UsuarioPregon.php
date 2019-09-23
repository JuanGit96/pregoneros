<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPregon extends Model
{
    protected $table = "usuario_pregon";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pregon_id', 'user_id', 'codigo_redime',  'nombre', 'celular', 'email','edad', 'sexo', 'donde_lo_conoces',
        'interesado', 'why', 'comentarios', 'ubicacion', 'latitud', 'longitud', 'photo', 'audio1', 'audio2', 'video',
        'approved', 'rebound', 'pregonType'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pregon()
    {
        return $this->belongsTo(Pregon::class);
    }

    public function redention()
    {
        return $this->belongsTo(Redention::class);
    }
}
