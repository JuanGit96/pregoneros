<?php

namespace App\Http\Controllers\Api;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();

        return response()->json(["data" => $faqs, "code" => 200],200);

    }
}
