<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Requests\FaqRequest;
use App\Http\Traits\auxiliarCrud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    use auxiliarCrud;

    private $pathViews;

    private $pathRoute;

    public function __construct()
    {
        $this->pathViews = "admin.faq.";
        $this->pathRoute = "faqs.";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::paginate(9);

        return view($this->pathViews."index",compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->pathViews."create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        Faq::create($request->all());

        return redirect()->route($this->pathRoute."index")->with("Success","Pregunta creada exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view($this->pathViews."show",compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view($this->pathViews."edit",compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $data = $this->deleteCampNull($request);

        $faq->update($data);

        return redirect()->route($this->pathRoute."show",$faq->id)->with("success","Pregunta editada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route($this->pathRoute."index")->with("success","Pregunta eliminada correctamente");
    }
}
