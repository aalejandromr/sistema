<?php

namespace App\Http\Controllers;

use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = Tipo::all();

        return view('tipo.index')
            ->with('tipos', $tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
                $tipo = new Tipo;
                        //
        if($request->ajax()){
            return view('tipo.add', compact('tipo'))->renderSections()['content'];
        }

        return view('tipo.add')->with('tipo', $tipo);
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
                return array('success' => false);
            }

            return Redirect::to('add-tipo')
                ->withErrors($validator);
        }else {

            $tipo = new Tipo;
       
            if($request->ajax()){

                $tipo->name = $request->name;
                if($tipo->save()) {
                    return array('success' => true, 'id' => $tipo->id);
                }

            }else {

                $tipo->name = $request->name;
                $tipo->save();
               return Redirect::to('bodega/dashboard/tipos')->with('message', 'Tipo agregado.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(int $tipo)
    {
        //
        $tipo = Tipo::find($tipo);
        return view('tipo.edit')->with('tipo', $tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
        //
        $rules = array(
            'name' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add-tipo')
                ->withErrors($validator);
        }
        else {
            $tipo = Tipo::find($request->id);
            $tipo->name = $request->name;
            $tipo->save();
            return Redirect::to('bodega/dashboard/tipos')->with('message', 'Tipo editada exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        //
    }
}
