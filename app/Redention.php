<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Redention extends Model
{
    protected $table = "redentions";

    protected $fillable = [
      "usuario_redime", "code", "checklist_id", "pregonero_id"
    ];

    function user ()
    {
        return $this->belongsTo(User::class,"usuario_redime");
    }

    function usuarioPregon()
    {
        return $this->belongsTo(UsuarioPregon::class, "checklist_id");
    }

    function pregonero ()
    {
        return $this->belongsTo(User::class,"pregonero_id");
    }
}
