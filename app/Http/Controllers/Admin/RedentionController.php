<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\auxiliarCrud;
use App\Redention;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedentionController extends Controller
{
    use auxiliarCrud;

    private $pathViews;

    private $pathRoute;

    public function __construct()
    {
        $this->pathViews = "admin.redention.";
        $this->pathRoute = "redentions.";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $redentions = Redention::paginate(9);

        return view($this->pathViews."index",compact('redentions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view($this->pathViews."create",compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Redention::create($data);

        return redirect()->route($this->pathRoute."index")->with("Success","Redencion creada exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Redention $redention)
    {
        return view($this->pathViews."show",compact('redention'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Redention $redention)
    {
        $users = User::all();

        return view($this->pathViews."edit",compact('redention','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Redention $redention)
    {
        $data = $this->deleteCampNull($request);

        $redention->update($data);

        return redirect()->route($this->pathRoute."show",$redention->id)->with("success","Redencion editada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Redention $redention)
    {
        $redention->delete();

        return redirect()->route($this->pathRoute."index")->with("success","Redencion eliminada correctamente");
    }
}
