<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer;

class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $client = new Consumer();
        $client->nombre= $request->nombre;
        $client->edad= $request->edad;
        $client->celular= $request->celular;
        $client->correo= $request->correo;
        $client->codigo= $request->codigo;
        $client->propietario_codigo= $request->propietario_codigo;

        if ($client->save()) {

//            return response()->json([
//                'status' => true,
//                'mensaje' => 'Pronto de contactaremos',
//            ]);

            return redirect()->route('welcome')->with('success', '¡Excelente! Pronto te contáctaremos');
        }else{
            return redirect()->route('welcome')->with('error', '¡No se pudo redimir tu còdigo');

//            return response()->json([
//                    'status' => false,
//                    'mensaje' => 'No se pudo redimir tu còdigo',
//                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
