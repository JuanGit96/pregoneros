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
use App\PushUserPregon;
use App\PushExperience;
use App\Experience;
use App\UsuarioPregon;

trait truncate
{
    public function deletePregons($campaign_id)
    {
        $campaign = Campaign::findOrFail($campaign_id);

        $pregons = $campaign->pregones();

        foreach($pregons->cursor() as $pregon)
        {
            #Eliminando registros de notificaciones push enviadas para evitar error de llave foranea en estas tablas
            $pushUserPregons = PushUserPregon::where('pregon_id','=',$pregon->id);
            
            foreach ($pushUserPregons->cursor() as $item)
            {
                $item->delete();
            }

            #Eliminando registros de experiencias asociados a ese pregon
            $experiencias = Experience::where('pregon_id','=',$pregon->id);
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
            $pregonesSuccess = UsuarioPregon::where('pregon_id','=',$pregon->id);
            foreach ($pregonesSuccess->cursor() as $item)
            {
                $item->delete();
            }

            #eliminando pregon
            $pregon->delete();
        }

    }

    public function deleteCampaigns($client_id)
    {
        $campaigns = Campaign::where("client_id","=",$client_id);

        foreach($campaigns->cursor() as $campaign)
        {
            $this->deletePregons($campaign->id);

            $campaign->delete();
        }
    }
}



