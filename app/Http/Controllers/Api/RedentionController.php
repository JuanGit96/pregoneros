<?php

namespace App\Http\Controllers\Api;

use App\Redention;
use App\User;
use App\UsuarioPregon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RedentionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'usuario_redime' => 'required',
            'code' => 'required'
        ];

        $messages = [
            'code.required' => 'Porfavor, envianos tu codigo',
            'usuario_redime.required' => 'Porfavor, inicia sesión',
        ];

        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails())
        {
            return response()->json(["error" => $v->errors()->first(), "code" => 400], 200);
        }

        $dataRedention = $this->getDataRedention($data["code"]);

        if (!$dataRedention)
            return response()->json(["error" => "el codigo no se encuentra en nuestra base de datos. Porfaavor revisa Mayusculas tildes, espacions y demás", "code" => 400], 200);

        $data["pregonero_id"] = $dataRedention["pregonero_id"];
        $data["checklist_id"] = $dataRedention["checklist_id"];

        $redention = Redention::create($data);

        return response()->json(["data"=> $redention, "code"=>201],201);
    }

    public function getDataRedention($code)
    {
        $checklist = UsuarioPregon::where("rebound","=",$code)->get()->first();

        if ($checklist == null)
        {
            $dataRedention["pregonero_id"] = $this->getPregonero($code);
            #$dataRedention["pregonero_id"] = 1;
            $dataRedention["checklist_id"] = null;
        }
        else
        {
            $dataRedention["pregonero_id"] = null;
            $dataRedention["checklist_id"] = $checklist->id;
        }

        if ($dataRedention["pregonero_id"] == null && $dataRedention["checklist_id"] == null)
            return false;

        return $dataRedention;
    }

    public function getPregonero($code)
    {
        # Dividiendo codigo por palabras

        $name = explode(" ",$code);

        #eliminando frase "me invita"
        unset($name[count($name)-1]);
        unset($name[count($name)-1]);

        #validando si despues de eliminar "me invita" o las dos ultimas palabras del arreglo queda algo en el mismo
        if ($name == [])
            return null;

        #obteniendo nombre real de pregonero
        $realname = "";

        $keys = array_keys($name);

        foreach ($name as $key => $item)
        {
            if ($key === end($keys)) {
                $realname .=$item;
            } else {
                $realname .=$item." ";
            }
        }

        #buscando nombre obtenido en base de datos

        $pregoneros = User::where("name","like", "%".$name[0]."%");

        foreach ($pregoneros->cursor() as $pregonero)
        {
            if ($pregonero->name." ".$pregonero->lastName == $realname)
                return $pregonero->id;
        }

        return null;

    }
}
