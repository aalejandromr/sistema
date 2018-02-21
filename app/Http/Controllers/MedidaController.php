<?php

namespace App\Http\Controllers;

use App\Medida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medidas = Medida::all();

        return view('medida.index')
            ->with('medidas', $medidas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $medida = new Medida;

        if($request->ajax()){
            return view('medida.add', compact('medi'))->with('medida', $medida)->renderSections()['content'];
        }

        return view('medida.add')->with('medida', $medida);
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
            'medida' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add_marca')
                ->withErrors($validator);
        }
        else {
            $medida = new Medida;

            if($request->ajax()){
                $medida->marca = $request->medida;
                if($medida->save()) {
                    return array('success' => true, 'id' => $medida->id);
                }

            }else {

                $medida->medida = $request->medida;
                $medida->save();
                return Redirect::to('bodega/dashboard/medidas')->with('message', 'Medida agregada.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function show(Medida $medida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function edit(int $medida)
    {
        //
        $Medida = Medida::find($medida);
        return view('medida.edit')->with('medida', $Medida);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medida $medida)
    {
        //
        $rules = array(
            'medida' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add-medida')
                ->withErrors($validator);
        }
        else {
            $medida = Medida::find($request->id);
            $medida->medida = $request->medida;
            $medida->save();
            return Redirect::to('bodega/dashboard/medidas')->with('message', 'Medida editada exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medida $medida)
    {
        //
    }
}
