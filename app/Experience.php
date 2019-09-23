<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Experience extends Model
{
    protected $table = "experiences";

    protected $fillable = [

        "user_id","pregon_id", "opinion" ,"lo_comprarias", "why",'photo', 'audio1', 'audio2', 'video',
        'approved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pregon()
    {
        return $this->belongsTo(Pregon::class);
    }

    public function scopePregonAsociado(Builder $query)
    {
        $select = [
            "experiences.*",
            "pregones.campaign_id",
            "pregones.identificador_pregon",
            "campaigns.client_id",
            "clients.razon_social"
        ];

        return
            $query
            ->select($select)
            ->join("pregones","pregones.id","=","experiences.pregon_id")
            ->join("campaigns","campaigns.id","=","pregones.campaign_id")
            ->join("clients","clients.id","campaigns.client_id");
    }
}
