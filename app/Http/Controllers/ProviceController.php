<?php

namespace App\Http\Controllers;

use App\Poblation;
use App\Provinces;
use Illuminate\Http\Request;

class ProviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces =Provinces::all();
        return view("province.index", compact("provinces"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poblations =Poblation::all();
        return view("province.create", compact("poblations"));
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
            "description" => "required|max:150|unique:provinces,description",
            "poblation_id" => "required"
        ]);

       Provinces::create($request->all());
        return redirect()->route("province.index")->with("success", "Registro guardado correctamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $province =Provinces::find($id);
        return view("province.show", compact("province"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province =Provinces::find($id);
        $poblations =Poblation::all();
        return view("province.edit", compact("province","poblations"));
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
            "description" => "required|max:150|unique:provinces,description"
        ]);

       Provinces::find($id)->update($request->all());
        return redirect()->route("province.index")->with("success", "Registro actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Provinces::find($id)->delete();
        return redirect()->route("province.index")->with("success", "Registro eliminado correctamente");

    }
}
