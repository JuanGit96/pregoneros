<?php

namespace App\Http\Controllers\Api;

use App\Http\Traits\registerUserToApi;
use App\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    use registerUserToApi;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return response()->json(["data" => $user, "code" => 201],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'dateBirth' => 'required|date',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:6|confirmed'
        ];

        $messages = [
            'required' => 'Todos los campos son obligatorios',
            'dateBirth.date' => 'La fecha enviada no tiene el formato correcto',
            'phone.date' => 'EL telefono celular es obligatorio',
            'email' => 'El campo de correo electrónico no tiene el formato correcto',
            'unique' => 'El :attribute que enviaste ya está registrado en nuestra plataforma, porfavor inicia sesion',
            'password.min' => 'La contraseña debe tener como minimo 6 caracteres o numeros',
            'confirmed' => 'Las contraseñas no coinciden',

        ];

        $v = Validator::make($request->all(), $rules, $messages);

        if ($v->fails())
        {
            return response()->json(["error" => $v->errors()->first(), "code" => 400], 200);
        }

        $data = $request->all();

        $data["password"] = bcrypt($request->password);

        $data["role_id"] = 4;

        $user = User::create($data);

        $this->guard()->login($user);

        $this->registered($user);


        return response()->json(["data" => $user, "code" => 201], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json(["data" =>$user, "code" => 200], 200);
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
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' =>'required|min:6|confirmed'
        ];

        $this->validate($request, $rules);

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->dateBirth = $request->dateBirth;
        $user->email = $request->email;

        if(!$user->isDirty())
        {
            return response()->json(["error" => 'se debe especificar al menos un valor diferente para actualizar', "code" => 422],422);
        }

        $user->save();


        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idaa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(204);
    }



}
