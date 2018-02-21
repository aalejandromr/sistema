<?php

namespace App\Http\Controllers;

use App\Fabricante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fabricantes = Fabricante::all();

        return view('fabricante.index')
            ->with('fabricantes', $fabricantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $fabricante = new Fabricante;

         if($request->ajax()){

            return view('fabricante.add', compact('fabricante'))->renderSections()['content'];
        }
   
        return view('fabricante.add')->with('fabricante', $fabricante);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'name' => 'required'
        );


        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
             if($request->ajax()){
                return false;
            }else{
            return Redirect::to('add-fabricante')
                ->withErrors($validator);
            }
        }
        else {

            $fabricante = new Fabricante;

            if($request->ajax()){

                $fabricante->name = $request->name;
                if($fabricante->save()) {
                    return array('success' => true, 'id' => $fabricante->id);
                }

            }else {

                $fabricante->name = $request->name;
                $fabricante->save();
                return Redirect::to('bodega/dashboard/fabricantes')->with('message', 'fabricante agregado.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricante $fabricante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function edit(int $fabricante)
    {
        //

        $fabricante = Fabricante::find($fabricante);
        return view('fabricante.edit')->with('fabricante', $fabricante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabricante $fabricante)
    {
        //
        $rules = array(
            'name' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add-construccion')
                ->withErrors($validator);
        }
        else {
            $fabricante = Fabricante::find($request->id);
            $fabricante->name = $request->name;
            $fabricante->save();
            return Redirect::to('bodega/dashboard/fabricantes')->with('message', 'Fabricante editado exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricante $fabricante)
    {
        //
    }
}
