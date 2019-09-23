<?php

namespace App\Http\Controllers\Api;

use App\Http\Traits\FileTrait;
use App\User;
use App\UsuarioPregon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsuarioPregonController extends Controller
{

    use FileTrait;



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pregones = UsuarioPregon::all();

        return response()->json(["data" => $pregones, "code" => 200],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            DB::commit();

            $rules = [
                'pregon_id' => 'required|integer',
                'user_id' => 'required|integer',
                'nombre' => 'required',
                'celular' => 'nullable',
                'email' => 'nullable',
                'edad' => 'required|integer',
                'sexo' => 'required|integer',
                'donde_lo_conoces' => 'required',
                'pregonType' => 'required',
                'interesado' => 'required|boolean',
                'why' => 'required',
                'comentarios' => 'nullable',
                'ubicacion' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
            ];

            $messages = [
                'pregon_id.required' => 'Error al enviar identificador de pregon porfavor contacte con los administradores',
                'user_id.required' => 'Error al enviar identificador de usuario actual, porfavor contacte con los administradores',
                'integer.edad' => 'La edad debe ser un numero',
                'integer' => 'el formato de los identificadores es equivocado porfavor contacte con los administradores',
                'nombre.required' => 'El campo nombre y apellido es obligatorio',
//                'celular.required' => 'El campo celular es obligatorio',
                'edad.required' => 'El campo edad es obligatorio',
                'sexo.required' => 'El campo sexo es obligatorio',
                'donde_lo_conoces.required' => 'Por favor dinos de donde conoces al sujeto en cuestion',
                'interesado.required' => 'Por favor dinos si estuvo interesado',
                'pregonType.required' => 'Por favor dinos que tipo de pregón estas haciendo',
                'why.required' => 'Explicanos el por qué del interes o  desinteres del sujeto',
                'ubicacion.required' => 'Error al obtener tu ubicacion. Porfavor contacta con soporte tecnico',
                'latitud.required' => 'Error al obtener tu ubicacion. Porfavor contacta con soporte tecnico',
                'longitud.required' => 'Error al obtener tu ubicacion. Porfavor contacta con soporte tecnico',
                'sexo.boolean' => 'El campo sexo es obligatorio',
                'interesado.boolean' => '¿Se mostró interesado? porfvor dinos en el formulario',
                //'image' => 'Porfavor si vaz a enviar un dato por el campo foto, que sea precisamente una foto',
                'file' => 'los campos de adjuntos no estan recibiendo el mismo, porfavor revisa lo que estas enviendo o contacta con los administradores'

            ];

            $v = Validator::make($request->all(), $rules, $messages);

            if ($v->fails())
            {
                return response()->json(["error" => $v->errors()->first(), "code" => 400], 200);
            }

            $data = $request->all();

            if (!isset($data["photo"])  && !isset($data["video"]) && !isset($data["audio1"]))
                return response()->json(["error" =>"¡Adjuntar evidencia es obligatorio!", "code" => 400], 200);


            if ($request->has('photo'))
            {
                $name = $this->saveFileBas64($data["client_id"],$data["campaign_id"],$data["pregon_id"],$data["user_id"],$data["nombre"],$data["photo"]);

                if ($name != false)
                    $data["photo"] = $name;
                else
                    return response()->json(["error" =>"error a subir adjunto del campo 'Foto'", "code" => 400], 200);
            }

            if ($request->has('video'))
            {
                $name = $this->saveFileBas64($data["client_id"],$data["campaign_id"],$data["pregon_id"],$data["user_id"],$data["nombre"],$data["video"], "video");

                if ($name != false)
                    $data["video"] = $name;
                else
                    return response()->json(["error" =>"error a subir adjunto del campo 'video'", "code" => 400], 200);
            }

            if ($request->has('audio1'))
            {
                $name = $this->saveFileBas64($data["client_id"],$data["campaign_id"],$data["pregon_id"],$data["user_id"],$data["nombre"],$data["audio1"], "audio");

                if ($name != false)
                    $data["audio1"] = $name;
                else
                    return response()->json(["error" =>"error a subir adjunto del campo 'audio1'", "code" => 400], 200);
            }

            if ($request->has('audio2'))
            {
                $name = $this->saveFileBas64($data["client_id"],$data["campaign_id"],$data["pregon_id"],$data["user_id"],$data["nombre"],$data["audio2"],"audio");

                if ($name != false)
                    $data["audio2"] = $name;
                else
                    return response()->json(["error" =>"error a subir adjunto del campo 'audio2'", "code" => 400], 200);
            }

            try
            {
                $codigo = base64_encode($data["nombre"]."~".$data["user_id"]."~".$data["pregon_id"]."~".Carbon::now());

                $data["rebound"] = substr($codigo,0,3).substr($codigo,-3);

                $usuarioPregon = UsuarioPregon::create($data);
            }
            catch(\Exception $exception)
            {
                return response()->json(["error" =>$exception, "code" => 400], 200);

            }

            return response()->json(["data" => $usuarioPregon, "code" => 201], 201);

        }
        catch (\Exception $exception)
        {
            DB::rollBack();

            return response()->json(["error" => $exception, "code" => 500], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregon  $pregon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pregon = UsuarioPregon::findOrFail($id);

        return response()->json(["data" => $pregon, "code" => 200], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregon  $pregon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsuarioPregon $pregon)
    {

        $rules = [
            'pregon_id' => 'required|integer',
            'user_id' => 'required|integer',
            'nombre' => 'required',
            'edad' => 'required|integer',
            'sexo' => 'required|boolean',
            'donde_lo_conoces' => 'required',
            'interesado' => 'required|boolean',
            'why' => 'required',
            'comentarios' => 'nullable',
            'photo' => 'nullable|image',
            'adjunto1' => 'nullable|file',
            'adjunto2' => 'nullable|file'
        ];

        $messages = [
            'pregon_id.required' => 'Error al enviar identificador de pregon porfavor contacte con los administradores',
            'user_id.required' => 'Error al enviar identificador de usuario actual, porfavor contacte con los administradores',
            'integer.edad' => 'La edad debe ser un numero',
            'integer' => 'el formato de los identificadores es equivocado porfavor contacte con los administradores',
            'nombre.required' => 'El campo nombre y apellido es obligatorio',
            'edad.required' => 'El campo edad es obligatorio',
            'sexo.required' => 'El campo sexo es obligatorio',
            'donde_lo_conoces.required' => 'Por favor dinos de donde conoces al sujeto en cuestion',
            'interesado.required' => 'Por favor dinos si estuvo interesado',
            'why.required' => 'Explicanos el sujeto por qué estuvo interesado',
            'sexo.boolean' => 'error al capturar formato de sexo del sujeto, porfavor contacte con los administradores',
            'interesado.boolean' => 'error al capturar formato de interés del sujeto, porfavor contacte con los administradores',
            'image' => 'Porfavor si vaz a enviar un dato por el campo foto, que sea precisamente una foto',
            'file' => 'los campos de adjuntos no estan recibiendo el mismo, porfavor revisa lo que estas enviendo o contacta con los administradores'

        ];

        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails())
        {
            return response()->json(["error" => $v->errors()->first(), "code" => 400], 200);
        }

        $pregon->nombre = $request->name;
        $pregon->edad = $request->lastName;
        $pregon->sexo = $request->dateBirth;
        $pregon->donde_lo_conoces = $request->email;
        $pregon->interesado = $request->email;
        $pregon->why = $request->email;

        if ($request->has('comentarios'))
            $pregon->comentarios = $request->email;

        if ($request->has('photo'))
            $pregon->photo = $request->email;

        if ($request->has('adjunto1'))
            $pregon->adjunto1 = $request->email;

        if ($request->has('adjunto2'))
            $pregon->adjunto2 = $request->email;

        if(!$pregon->isDirty())
        {
            return response()->json(["error" => 'se debe especificar al menos un valor diferente para actualizar', "code" => 422],422);
        }

        $pregon->save();

        return response()->json($pregon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregon  $pregon
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsuarioPregon $pregon)
    {
        $pregon->delete();

        return response()->json(204);
    }

    public function downloadFileOrPhoto($id, $file)
    {
        $this->downloadFile($id, $file);
    }

    public function upFileToServer(Request $request)
    {
//        $rules = [
//            'pregon_id' => 'required|integer',
//            'user_id' => 'required|integer',
//            'campaign_id' => 'required|integer',
//            'client_id' => 'required|integer',
//        ];
//
//        $messages = [
//            'pregon_id.required' => 'Error al enviar identificador de pregon porfavor contacte con los administradores',
//            'user_id.required' => 'Error al enviar identificador de usuario actual, porfavor contacte con los administradores',
//            'campaign_id.required' => 'Error al enviar identificador de usuario actual, porfavor contacte con los administradores',
//            'client_id.required' => 'Error al enviar identificador de usuario actual, porfavor contacte con los administradores',
//
//
//        ];

//        $v = Validator::make($request->all(), $rules, $messages);
//
//        if ($v->fails())
//        {
//            return response()->json(["error" => $v->errors()->first(), "code" => 400], 200);
//        }

        $data = $request->all();

        $name = $this->saveFile($request,1,1,1,1,"video");

        if ($name != false)
            $data["photo"] = $name;
        else
            return response()->json(["error" =>"error a subir adjunto del campo 'Foto'", "code" => 400], 200);

        return response()->json(["success" =>"Video arriba", "code" => 200], 200);
    }


}
