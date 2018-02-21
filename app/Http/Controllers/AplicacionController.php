<?php

namespace App\Http\Controllers;

use App\Aplicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AplicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aplicacion = Aplicacion::all();
        return view('aplicacion.index')
            ->with('aplicaciones', $aplicacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
                //
        $aplicacion = new Aplicacion;

        if($request->ajax()){
            return view('aplicacion.add', compact('aplicacion'))->renderSections()['content'];
        }

        return view('aplicacion.add')->with('aplicacion', $aplicacion);
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
            'aplicacion' => 'required'
        );


        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
                
            if($request->ajax()){
                return array('success' => false)
            }else{
                return Redirect::to('add-aplicacion')
                ->withErrors($validator);    
            }
            
        }
        else {

            $aplicacion = new Aplicacion;

            if($request->ajax()){

                $aplicacion->aplicacion = $request->aplicacion;
                if($aplicacion->save()) {
                    return array('success' => true, 'id' => $aplicacion->id);
                }

            }else {

                $aplicacion->aplicacion = $request->aplicacion;
                $aplicacion->save();
                return Redirect::to('bodega/dashboard/aplicaciones')->with('message', 'aplicacion agregada.');
            }//ELSE AJAX

        }//FINAL ELSE VALIDATOR
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Aplicacion $aplicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(int $aplicacion)
    {
        //
        $aplicacion = Aplicacion::find($aplicacion);
        return view('aplicacion.edit')->with('aplicacion', $aplicacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aplicacion $aplicacion)
    {
        //
        $rules = array(
            'aplicacion' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add-aplicacion')
                ->withErrors($validator);
        }
        else {
            $aplicacion = Aplicacion::find($request->id);
            $aplicacion->aplicacion = $request->aplicacion;
            $aplicacion->save();
            return Redirect::to('bodega/dashboard/aplicaciones')->with('message', 'aplicacion editada exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aplicacion $aplicacion)
    {
        //
    }
}
