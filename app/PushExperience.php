<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushExperience extends Model
{
    protected $table = "push_experience";

    protected $fillable = [
      "experience_id"
    ];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
