<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class Pregon extends Model
{
    protected $table = "pregones";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identificador_pregon', 'beneficio_redime', 'objetivo', 'pago', 'fecha_limite', 'pregon', 'experiencia', 'evidencia', 'evidencia_camps', 'campaign_id', 'moduleStatus', 'support_material'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function users()
    {
        return
            $this
                ->belongsToMany('\App\User','usuario_pregon')
                ->withPivot('nombre', 'celular', 'edad', 'sexo', 'donde_lo_conoces',
                    'interesado', 'why', 'comentarios', 'ubicacion', 'latitud', 'longitud', 'photo', 'audio1', 'audio2', 'video');
    }

    public function scopeActive(Builder $query)
    {
        return $query
                ->whereNotIn("pregones.moduleStatus",[0])
                ->whereDate("fecha_limite",">=",Carbon::now()->format('Y-m-d'));
    }
}
