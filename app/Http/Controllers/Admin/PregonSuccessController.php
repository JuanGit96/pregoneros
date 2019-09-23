<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PregonSuccessRequest;
use App\Http\Traits\auxiliarCrud;
use App\Pregon;
use App\User;
use App\UsuarioPregon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PregonSuccessController extends Controller
{
    use auxiliarCrud;

    private $pathViews;

    private $pathRoute;

    public function __construct()
    {
        $this->pathViews = "admin.pregonSuccess.";

        $this->pathRoute = "usuarioPregons.";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pregonesSuccess = UsuarioPregon::all();

        return view($this->pathViews."index",compact('pregonesSuccess'));
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
    public function store(PregonSuccessRequest $request)
    {
        UsuarioPregon::create($request->all());

        return redirect()->route($this->pathRoute."index")->with("Success","Registro creado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pregonSuccess = UsuarioPregon::find($id);

        return view($this->pathViews."show",compact('pregonSuccess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregonSuccess = UsuarioPregon::find($id);

        $users = User::all();

        $pregons = Pregon::all();

        return view($this->pathViews."edit",compact('pregonSuccess','users','pregons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PregonSuccessRequest $request, $id)
    {
        $pregonSuccess = UsuarioPregon::find($id);

        $data = $this->deleteCampNull($request);

        $pregonSuccess->update($data);

        return redirect()->route($this->pathRoute."show",$pregonSuccess->id)->with("success","Pregon realizado por usuario editada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pregonSuccess = UsuarioPregon::find($id);

        $pregonSuccess->delete();

        return redirect()->route($this->pathRoute."index")->with("success","Registro eliminado correctamente");
    }
}
