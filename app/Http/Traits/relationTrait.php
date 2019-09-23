<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 2/05/19
 * Time: 09:08 AM
 */

namespace App\Http\Traits;


use App\Campaign;
use App\Client;
use App\Pregon;

trait relationTrait
{
    public function capturecodepregon($campaignid)
    {
        $campaign = Campaign::find($campaignid);

        $id_client = $campaign->client_id;

        $client = Client::find($id_client);

        $lastestPregon = Pregon::where('campaign_id','=',$campaignid);

        $numberPregonsByCampaign =$lastestPregon->count();

        $pregoncode = $client->indicativo.$campaign->code."-".($numberPregonsByCampaign+1);

        return response()->json(["identificador" => $pregoncode],200);
    }
}