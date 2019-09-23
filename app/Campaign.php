<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class Campaign extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'object', 'code', 'budget', 'scope', 'client_id', 'moduleStatus'
    ];

    public function pregones()
    {
        return $this->hasMany(Pregon::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function scopeActive(Builder $query)
    {
        return $query
                ->whereNotIn("moduleStatus",[0])
                ->get();
    }
}
