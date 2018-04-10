<?php

namespace App\Http\Controllers;

use App\Construccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class ConstruccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $construcciones = Construccion::all();

        return view('construccion.index')
            ->with('construcciones', $construcciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $construccion = new Construccion;

        if($request->ajax()){
            return view('construccion.add', compact('construccion'))->with('construccion', $construccion)->renderSections()['content'];
        }
        return view('construccion.add')->with('construccion', $construccion);
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
            }else{
                return Redirect::to('add-construccion')
                    ->withErrors($validator);
            }
        }
        else {

            $construccion = new Construccion;
            if($request->ajax()){
                $construccion->name = $request->name;
                if($construccion->save()) {
                    return array('success' => true, 'id' => $construccion->id);
                }

            }else {
                $construccion->name = $request->name;
                $construccion->save();
                return Redirect::to('bodega/dashboard/construcciones')->with('message', 'Construccion agregada.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Construccion  $construccion
     * @return \Illuminate\Http\Response
     */
    public function show(Construccion $construccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Construccion  $construccion
     * @return \Illuminate\Http\Response
     */
    public function edit(int $construccion)
    {
        //
        $Construccion = Construccion::find($construccion);
        return view('construccion.edit')->with('construccion', $Construccion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Construccion  $construccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Construccion $construccion)
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
            $construccion = Construccion::find($request->id);
            $construccion->name = $request->name;
            $construccion->save();
            return Redirect::to('bodega/dashboard/construcciones')->with('message', 'Construccion editada exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Construccion  $construccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Construccion $construccion)
    {
        //
    }
}