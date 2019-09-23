<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'razon_social', 'nit', 'email', 'telefono', 'web', 'indicativo', 'moduleStatus'
    ];

    public function campaigns()
    {
        $this->hasMany(Campaign::class);
    }

    public function scopeActive(Builder $query)
    {
        return $query
                ->whereNotIn("moduleStatus",[0])
                ->get();
    }


}
