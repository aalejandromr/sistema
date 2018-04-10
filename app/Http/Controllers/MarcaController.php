<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marcas = Marca::all();

        return view('marcas.index')
            ->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        if($request->ajax()){
            return view('bodega.marca.add', compact('marca'))->renderSections()['content'];
        }

        //
        return view('bodega.marca.add');
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
            'marca' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){

            if($request->ajax()){
                array('success' => false);
            }else{
                return Redirect::to('add_marca')
                    ->withErrors($validator);
            }
        }
        else {
            $marca = new Marca;

            if($request->ajax()){

                $marca->marca = $request->marca;
                if($marca->save()) {
                    return array('success' => true, 'id' => $marca->id);
                }

            }else {

                $marca->marca = $request->marca;
                $marca->save();
                return Redirect::to('bodega/dashboard/marcas')->with('message', 'Marca agregada.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(int $marca)
    {
        $Marca = Marca::find($marca);
        return view('marcas.edit')->with('marca', $Marca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        //
        
        $rules = array(
            'marca' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add_marca')
                ->withErrors($validator);
        }
        else {
            $marca = Marca::find($request->id);
            $marca->marca = $request->marca;
            $marca->save();
            return Redirect::to('bodega/dashboard/marcas')->with('message', 'Marca editada.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function delete(Marca $marca)
    {
        
    }
}