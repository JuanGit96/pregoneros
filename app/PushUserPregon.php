<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushUserPregon extends Model
{
    protected $table = "push_user_pregon";

    protected $fillable = [
        'user_id','pregon_id'
    ];
}
