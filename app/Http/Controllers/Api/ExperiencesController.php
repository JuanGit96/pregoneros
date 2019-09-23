<?php

namespace App\Http\Controllers\Api;

use App\Experience;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExperiencesController extends Controller
{

    use FileTrait;

    public function multimediacamps($id)
    {
        $experience = Experience::select("evidencia_camps")->find($id);

        $evidenciaCapms = $experience->evidencia_camps;

        $evidenciaCapms = explode("_",$evidenciaCapms);

        foreach ($evidenciaCapms as $key => $item)
        {
            if ($item == "")
            {
                unset($evidenciaCapms[$key]);
            }
            else
            {
                $response[$item] = "true";
            }
        }

        if (!array_key_exists("foto", $response))
            $response["foto"] = "false";

        if (!array_key_exists("video", $response))
            $response["video"] = "false";

        if (!array_key_exists("audio", $response))
            $response["audio"] = "false";


        return response()->json(["data" =>$response, "code" => 200], 200);

    }

    public function experienciaAprobada($id_pregon, $id_usuario)
    {
        $experiencia = Experience::
                            select("approved")
                            ->where("pregon_id",'=',$id_pregon)
                            ->where("user_id",'=',$id_usuario)
                            ->get()
                            ->last();

        if ($experiencia == null)
        {
            $experiencia["approved"] = 0;
        }

        return response()->json(["data" =>$experiencia, "code" => 200], 200);

    }

    public function store(Request $request)
    {
        try {
            DB::commit();

            $rules = [
                'pregon_id' => 'required|integer',
                'user_id' => 'required|integer',
                'opinion' => 'required',
                'lo_comprarias' => 'required',
                'why' => 'required',

            ];

            $messages = [
                'pregon_id.required' => 'Error al enviar identificador de pregon porfavor contacte con los administradores',
                'user_id.required' => 'Error al enviar identificador de usuario actual, porfavor contacte con los administradores',
                'integer' => 'el formato de los identificadores es equivocado porfavor contacte con los administradores',
                'opinion.required' => 'El campo opinion es obligatorio',
                'lo_comprarias.required' => 'El campo (¿Lo comprarias?) es obligatorio',
                'why.required' => 'Explicanos el por qué del interes o  desinteres del sujeto',
            ];

            $v = Validator::make($request->all(), $rules, $messages);

            if ($v->fails()) {
                return response()->json(["error" => $v->errors()->first(), "code" => 400], 200);
            }

            $data = $request->all();

            if ($request->has('photo')) {
                $name = $this->saveFileBas64($data["client_id"], $data["campaign_id"], $data["pregon_id"], $data["user_id"], $data["name"], $data["photo"]);

                if ($name != false)
                    $data["photo"] = $name;
                else
                    return response()->json(["error" => "error a subir adjunto del campo 'Foto'", "code" => 400], 200);
            }

            if ($request->has('video')) {
                $name = $this->saveFileBas64($data["client_id"], $data["campaign_id"], $data["pregon_id"], $data["user_id"], $data["name"], $data["video"], "video");

                if ($name != false)
                    $data["video"] = $name;
                else
                    return response()->json(["error" => "error a subir adjunto del campo 'video'", "code" => 400], 200);
            }

            if ($request->has('audio1')) {
                $name = $this->saveFileBas64($data["client_id"], $data["campaign_id"], $data["pregon_id"], $data["user_id"], $data["name"], $data["audio1"], "audio");

                if ($name != false)
                    $data["audio1"] = $name;
                else
                    return response()->json(["error" => "error a subir adjunto del campo 'audio1'", "code" => 400], 200);
            }

            if ($request->has('audio2')) {
                $name = $this->saveFileBas64($data["client_id"], $data["campaign_id"], $data["pregon_id"], $data["user_id"], $data["name"], $data["audio2"], "audio");

                if ($name != false)
                    $data["audio2"] = $name;
                else
                    return response()->json(["error" => "error a subir adjunto del campo 'audio2'", "code" => 400], 200);
            }

            try {
                $experiencia = Experience::create($data);
            } catch (\Exception $exception) {
                return response()->json(["error" => $exception, "code" => 400], 200);

            }

            return response()->json(["data" => $experiencia, "code" => 201], 201);

        } catch (\Exception $exception) {

            DB::rollBack();

            return response()->json(["error" => "Error en el servidor. Por favor contacte con los administradores", "code" => 500], 200);
        }

    }


}
