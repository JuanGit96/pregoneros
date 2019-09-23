<?php

namespace App\Http\Controllers;

use App\Interested;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterestedController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Interested::create($request->all());

        return redirect()->back()->with("success","pronto te contactaremos");
    }
}
