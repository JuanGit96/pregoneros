<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use App\Client;
use App\Http\Requests\CampaignRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\auxiliarCrud;
use App\Http\Traits\truncate;

class CampaignController extends Controller
{
    use auxiliarCrud;

    use truncate;

    private $pathViews;

    private $pathRoute;

    public function __construct()
    {
        $this->pathViews = "admin.campaign.";
        $this->pathRoute = "campaigns.";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::paginate(9);

        return view($this->pathViews."index", compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();

        return view($this->pathViews."create",compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampaignRequest $request)
    {
        Campaign::create($request->all());

        return redirect()->route($this->pathRoute."index")->with('success', 'Campaña creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        return view($this->pathViews."show",compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $clients = Client::all();

        return view($this->pathViews."edit",compact('campaign','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CampaignRequest $request
     * @param Campaign $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignRequest $request, Campaign $campaign)
    {
        $data = $this->deleteCampNull($request);

        $campaign->update($data);

        return redirect()->route($this->pathRoute."show", $campaign->id)->with("success","Registro editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $this->deletePregons($campaign->id);

        $campaign->delete();

        return redirect()->route($this->pathRoute."index")->with("success","Registro eliminado correctamente");
    }
    
}
