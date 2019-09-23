<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use App\Experience;
use App\Http\Requests\PregonRequest;
use App\Http\Traits\auxiliarCrud;
use App\Http\Traits\relationTrait;
use App\Http\Traits\FileTrait;
use App\Pregon;
use App\PushExperience;
use App\PushUserPregon;
use App\UsuarioPregon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PregonController extends Controller
{
    use relationTrait;

    use auxiliarCrud;

    use FileTrait;

    private $pathViews;

    private $pathRoute;

    public function __construct()
    {
        $this->pathViews = "admin.pregon.";
        $this->pathRoute = "pregons.";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pregons = Pregon::paginate(9);

        return view($this->pathViews."index",compact('pregons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaigns = Campaign::all();

        return view($this->pathViews."create",compact('campaigns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PregonRequest $request)
    {
        $data = $request->all();

        $checks = "";

        foreach ($data as $key => $item)
        {
            if ($item == "on")
            {
                $check = explode("_",$key)[1];

                $checks = $checks."_".$check;
            }
        }

        $data["evidencia_camps"] = $checks;

        $pregon = Pregon::create($data);

        if(isset($data["support_material"]))
        {
            if ($data["support_material"] != null)
            {
                $campaign = Campaign::findOrFail($data["campaign_id"]);

                $upFile = $this->saveFile($request, $campaign->client_id,$data["campaign_id"],$pregon->id,null,"support_material");

                if(!$upFile)
                    return redirect()->route($this->pathRoute."index")->with("Errors",["Error al subir material de apoyo"]);
                else {
                    $pregon->support_material = $upFile;
                    $pregon->save();
                }
            }

        }
        
        return redirect()->route($this->pathRoute."index")->with("Success","Pregon creado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pregon $pregon)
    {
        return view($this->pathViews."show",compact('pregon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregon $pregon)
    {
        $campaigns = Campaign::all();

        return view($this->pathViews."edit",compact('pregon','campaigns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PregonRequest $request, Pregon $pregon)
    {
        $data = $this->deleteCampNull($request);

        $checks = "";

        foreach ($data as $key => $item)
        {
            if ($item == "on")
            {
                $check = explode("_",$key)[1];

                $checks = $checks."_".$check;
            }
        }

        if ($checks != "")
            $data["evidencia_camps"] = $checks;

        $pregon->update($data);

        if (isset($data["support_material"])) 
        {
            if($data["support_material"] != null)
            {
                $campaign = Campaign::findOrFail($data["campaign_id"]);
    
                $upFile = $this->saveFile($request, $campaign->client_id,$data["campaign_id"],$pregon->id,null,"support_material");    
        
                if(!$upFile)
                    return redirect()->route($this->pathRoute."index")->with("Errors",["Error al subir material de apoyo"]);
                else {
                    $pregon->support_material = $upFile;
                    $pregon->save();
                }
            }
        }
        

        return redirect()->route($this->pathRoute."show",$pregon->id)->with("success","Pregon editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregon $pregon)
    {

        $pregon_id = $pregon->id;

        #Eliminando registros de notificaciones push enviadas para evitar error de llave foranea en estas tablas
        $pushUserPregons = PushUserPregon::where('pregon_id','=',$pregon_id);
        foreach ($pushUserPregons->cursor() as $item)
        {
            $item->delete();
        }

        #Eliminando registros de experiencias asociados a ese pregon
        $experiencias = Experience::where('pregon_id','=',$pregon_id);
        foreach ($experiencias->cursor() as $item)
        {
            #eliminando las notificaciones push con esa experiencia asociada
            $pushExperience = PushExperience::where('experience_id','=',$item->id);
            foreach($pushExperience->cursor() as $itemPushExperience)
            {
                $itemPushExperience->delete();
            }

            $item->delete();
        }

        #Eliminando registros de pregones realizados
        $pregonesSuccess = UsuarioPregon::where('pregon_id','=',$pregon_id);
        foreach ($pregonesSuccess->cursor() as $item)
        {
            $item->delete();
        }

        #eliminando pregon
        $pregon->delete();

        return redirect()->route($this->pathRoute."index")->with("success","Pregon eliminado correctamente");
    }
}
