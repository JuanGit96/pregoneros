<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interested extends Model
{
    protected $table = "interested";

    protected $fillable = [
      "name","phone","email","company"
    ];
}
