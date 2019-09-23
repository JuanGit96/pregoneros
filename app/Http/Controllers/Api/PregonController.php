<?php

namespace App\Http\Controllers\Api;

use App\Pregon;

class PregonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pregones = Pregon::active()->get();

        foreach ($pregones as $pregon)
        {
            $pregon->clientName = $pregon->campaign->client->razon_social;
            $pregon->idCampaign = $pregon->campaign->id;
            $pregon->idClient = $pregon->campaign->client->id;
        }

        return response()->json(["data" => $pregones, "code" => 200],200);
    }

    public function show($id)
    {
        $pregon = Pregon::find($id);

        $pregon->clientName = $pregon->campaign->client->razon_social;
        $pregon->idCampaign = $pregon->campaign->id;
        $pregon->idClient = $pregon->campaign->client->id;

        return response()->json(["data" =>$pregon, "code" => 200], 200);
    }

    public function multimediacamps($id)
    {
        $pregon = Pregon::select("evidencia_camps")->find($id);

        $evidenciaCapms = $pregon->evidencia_camps;

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


}
