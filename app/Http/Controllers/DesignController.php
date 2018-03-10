<?php

namespace App\Http\Controllers;

use App\Design;
use Illuminate\Http\Request;
use App\Aplicacion;
use App\Fabricante;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $designs = Design::all();
        return view('design.index')
            ->with('designs', $designs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $design = new design;
        $data = array(
            'design' => $design,
            'aplicacion' => Aplicacion::pluck('aplicacion', 'id'),
            'fabricantes' => Fabricante::pluck('name','id')
        );

        if($request->ajax()){
            return view('design.add', compact('design'))->with('data', $data)->renderSections()['content'];
        }

        return view('design.add')->with('data', $data);
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
        //dd($request->all()['aplicacions'][0]);
        //dd($request->aplicacions[0]);
        $rules = array(
            'design' => 'required',
            'aplicacions' => 'required',
            'fabricantes' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            if($request->ajax()){
                return array('success' => false);
            }
            return Redirect::to('add-construccion')
                ->withErrors($validator);
        }
        else {
            $design = new Design;

            if($request->ajax()){

                $design->design = $request->design;
                $design->aplicacion_id = $request->aplicacions[0];
                $design->fabricante_id = $request->fabricantes[0];
                if($aplicacion->save()) {
                    return array('success' => true, 'id' => $aplicacion->id);
                }

            }else {
                $design->design = $request->design;
                $design->aplicacion_id = $request->aplicacions[0];
                $design->fabricante_id = $request->fabricantes[0];
                $design->save();
                return Redirect::to('bodega/dashboard/diseños')->with('message', 'Construccion agregada.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(string $design)
    {
        //
        $design = Design::find($design);
        $data = array(
            'design' => $design,
            'aplicacion' => Aplicacion::pluck('aplicacion', 'id'),
            'fabricantes' => Fabricante::pluck('name','id')
        );
        return view('design.edit')->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $design)
    {
        //
        $rules = array(
            'design' => 'required',
            'aplicacions' => 'required',
            'fabricantes' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add-construccion')
                ->withErrors($validator);
        }
        else {
            $design = Design::find($request->id);
            $design->design = $request->design;
            $design->aplicacion_id = $request->aplicacions[0];
            $design->fabricante_id = $request->fabricantes[0];
            $design->save();
            return Redirect::to('bodega/dashboard/diseños')->with('message', 'Construccion editada exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design)
    {
        //
    }

    public function getFabricanteAndAplicacion(Request $request){
        $design = $request->all()['design'];
        $fabricantes = Design::find($design)->fabricantes;
        $aplicaciones = Design::find($design)->aplicaciones;
        $result = Array(
            'fabricante_name' => $fabricantes['name'],
            'aplicacion_name' => $aplicaciones['aplicacion']
        );
        if ($result) {
            return $result;
        }
        else {
            return ['data' => 'Error al cargar fabricante.'];
        }
    }
}