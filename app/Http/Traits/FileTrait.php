<?php namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

trait FileTrait
{

    public function saveFile($request, $cliente,$campania,$pregon,$user,$camp)
    {
        try
        {
            //obtenemos el campo file definido en el formulario
            $file = $request->file($camp);

            //obtenemos el nombre del archivo
            $nombre = $request->file($camp)->getClientOriginalName();

            if ($user != null) {
                $path = $cliente.'/'.$campania.'/'.$pregon.'/'.$user.'/';
            }else{
                $path = $cliente.'/'.$campania.'/'.$pregon.'/support_material/';
            }

            //revisamos si existe el archivo
            $exists = Storage::disk('public')->exists($path.$nombre);

            if ($exists)
                $nombre = Carbon::now().'-'.$nombre;

            //indicamos que queremos guardar un nuevo archivo en el disco local
            Storage::disk('public')->put($path.$nombre,  File::get($file));

            return $nombre;
        }
        catch (\Exception $exception)
        {
            return false;
        }

    }

    public function saveFileBas64($cliente,$campania,$pregon,$user,$nombre,$fileString, $type = "image")
    {
        try
        {
            $file = base64_decode($fileString);

            $path = $cliente.'/'.$campania.'/'.$pregon.'/'.$user.'/';

            //revisamos si existe el archivo
            if ($type == "image")
                $extension = ".jpg";
            if ($type == "video")
                $extension = ".mp4";
            if ($type == "audio")
                $extension = ".mp3";

            $exists = Storage::disk('public')->exists($path.$nombre.$extension);

            if ($exists)
              $nombre = $nombre.'-'.Carbon::now();

            //indicamos que queremos guardar un nuevo archivo en el disco local
            Storage::disk('public')->put($path.$nombre.$extension,  $file);

            return $nombre.$extension;
        }
        catch (\Exception $exception)
        {
            return false;
        }

    }

    public function downloadFile($user,$pregon,$file)
    {
        $public_path = public_path();
        $url = $public_path.'/storage/'.$pregon.'/'.$user.'/'.$file;

        //verificamos si el archivo existe y lo retornamos
        if (Storage::exists($file))
        {
            return response()->download($url);
        }
        else
        {
            return Response()->json(["error" => "No se encuentra el archivo a descargar", "code" => 400],200);
        }

    }


}