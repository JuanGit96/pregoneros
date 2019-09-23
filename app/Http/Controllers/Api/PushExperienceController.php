<?php

namespace App\Http\Controllers\Api;

use App\Experience;
use App\PushExperience;
use App\User;
use Illuminate\Http\Request;

class PushExperienceController extends Controller
{
    public function sendPushNotifications($user_id)
    {
        #Notificaciones ya enviadas
        $pushExperience = PushExperience::all();

        #Experiencias aprovadas
        $experiencesByUser = Experience::where("user_id","=",$user_id)->where("approved","=",1)->pregonAsociado()->get()->toArray();

        if ($pushExperience->isEmpty())
        {
            $this->createRegisterPushExperience($experiencesByUser);

            #enviando pregones
            return response()->json(["data" => $experiencesByUser,"code" => 200],200);
        }
        else
        {

            foreach($experiencesByUser as $key => $item)
            {
                $experienceByUserArray[$key] = $item["id"];
            }

            $pushExperienceArray = PushExperience::select("experience_id")->whereIn("experience_id",$experienceByUserArray)->get()->toArray();

            $experiencesByUser = Experience::where("user_id","=",$user_id)->where("approved","=",1)->whereNotIn("experiences.id",$pushExperienceArray)->pregonAsociado()->get();

            $this->createRegisterPushExperience($experiencesByUser);

        }

        #enviando pregones
        return response()->json(["data" => $experiencesByUser,"code" => 200],200);

    }

    public function createRegisterPushExperience($experiencesByUser)
    {
        #creando registro de push enviados
        foreach ($experiencesByUser as $item)
        {
            PushExperience::create(
                [
                    "experience_id" => $item["id"]
                ]
            );
        }
    }
}
