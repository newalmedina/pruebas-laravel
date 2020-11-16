<?php

namespace App\Http\Controllers;

use App\Poblation;
use Illuminate\Http\Request;

class PoblationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poblations = Poblation::all();
        return view("poblation.index", compact("poblations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("poblation.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "description" => "required|max:150|unique:poblations,description"
        ]);

        Poblation::create($request->all());
        return redirect()->route("poblation.index")->with("success", "Registro guardado correctamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poblation = Poblation::find($id);
        return view("poblation.show", compact("poblation"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poblation = Poblation::find($id);
        return view("poblation.edit", compact("poblation"));
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
        $this->validate($request, [
            "description" => "required|max:150|unique:poblations,description"
        ]);

        Poblation::find($id)->update($request->all());
        return redirect()->route("poblation.index")->with("success", "Registro actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Poblation::find($id)->delete();
        return redirect()->route("poblation.index")->with("success", "Registro eliminado correctamente");

    }
}
