<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Requests\ClientRequest;
use App\Http\Traits\auxiliarCrud;
use App\Http\Traits\truncate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    use auxiliarCrud;

    use truncate;

    private $pathViews;

    private $pathRoute;

    public function __construct()
    {
        $this->pathViews = "admin.client.";
        $this->pathRoute = "clients.";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(9);

        return view($this->pathViews."index",compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->pathViews."create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        Client::create($request->all());

        return redirect()->route($this->pathRoute."index")->with("success","Cliente creado con exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view($this->pathViews."show",compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view($this->pathViews."edit",compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $data = $this->deleteCampNull($request);

        $client->update($data);

        return redirect()->route($this->pathRoute."show",$client->id)->with("success","Cliente editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $this->deleteCampaigns($client->id);

        $client->delete();

        return redirect()->route($this->pathRoute."index")->with("success","Cliente eliminado correctamente");
    }
}
