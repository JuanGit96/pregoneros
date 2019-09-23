<?php

namespace App\Http\Controllers\Admin;

use App\Experience;
use App\Http\Requests\ExperienceRequest;
use App\Http\Traits\auxiliarCrud;
use App\Pregon;
use App\User;
use App\PushExperience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{

    use auxiliarCrud;

    private $pathViews;

    private $pathRoute;

    public function __construct()
    {
        $this->pathViews = "admin.experience.";

        $this->pathRoute = "experiences.";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();

        return view($this->pathViews."index",compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $pregons = Pregon::all();

        return view($this->pathViews."create",compact('users','pregons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceRequest $request)
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

        Experience::create($data);

        return redirect()->route($this->pathRoute."index")->with("success","Experiencia creada correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return view($this->pathViews."show",compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        $users = User::all();

        $pregons = Pregon::all();

        return view($this->pathViews."edit",compact('experience','users','pregons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceRequest $request, Experience $experience)
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

        $experience->update($data);

        return redirect()->route($this->pathRoute."show",$experience->id)->with("success","Experiencia editada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {

        #Eliminando registros de notificaciones push enviadas para evitar error de llave foranea en estas tablas
        $pushExperiences = PushExperience::where('experience_id','=',$experience->id);
        foreach ($pushExperiences->cursor() as $item)
        {
            $item->delete();
        }

        $experience->delete();

        return redirect()->route($this->pathRoute."index")->with("success","Experiencia eliminada correctamente");
    }
}
