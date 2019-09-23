<?php

namespace App\Http\Controllers\Api;

use App\Pregon;
use App\PushUserPregon;
use Illuminate\Http\Request;

class PushUserPregonController extends Controller
{
    private $user_id;

    public function __construct()
    {}

    public function sendPregonPush ($id)
    {
        $this->user_id = $id;

        #arreglo con pregones ya notificados al usuario
        $pregonsByUser = $this->pregonsByUser();

        #si el arreglo es vacio
        if ($pregonsByUser->isEmpty())
        {
            #arreglo con pregones a notificar
            $pregonsToSend = $this->sendPregons();

            #se registra arreglo con pregones a notificar
            $this->createRegisterPregon();
        }
        else
        {
            $pregonsToSend = $this->sendPregons($pregonsByUser);

            $this->createRegisterPregon($pregonsToSend);
        }

        return response()->json(["data" => $pregonsToSend, "code" => 200],200);
    }


    public function pregonsByUser()
    {
        $select = [
          "pregon_id"
        ];

        return
            PushUserPregon
                ::select($select)
                ->where('user_id','=', $this->user_id)
                ->pluck("pregon_id");
    }

    public function sendPregons($notSend = null)
    {
        $select = [
            "pregones.id AS id_pregon",
            "campaigns.id AS id_campaign",
            "clients.id AS id_client",
            "clients.razon_social",
            "pregones.identificador_pregon",
            "pregones.pago",
        ];

        $pregonsSend =
            Pregon
                ::active()
                ->select($select)
                ->join('campaigns','pregones.campaign_id','=','campaigns.id')
                ->join('clients','campaigns.client_id','=','clients.id');

        if ($notSend == null)
            $pregonsSend = $pregonsSend->get();
        else
        {
            $pregonsSend =
                $pregonsSend->whereNotIn("pregones.id",$notSend)->get();
        }

        return $pregonsSend;
    }

    public function createRegisterPregon($pregonsToSend = null)
    {
        if ($pregonsToSend == null)
        {
            $select = [
                "id"
            ];

            $ids = Pregon::all($select);

            foreach ($ids as $pregon)
            {
                PushUserPregon::create([
                    'pregon_id' => $pregon->id,
                    'user_id' => $this->user_id
                ]);
            }
        }
        else
        {
            foreach ($pregonsToSend as $pregonSend)
            {
                PushUserPregon::create([
                    'pregon_id' => $pregonSend->id_pregon,
                    'user_id' => $this->user_id
                ]);
            }
        }

    }

}
