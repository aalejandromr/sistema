<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empresas = Empresa::all();

        return view('empresa.index')
            ->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $empresa = new Empresa;
         if($request->ajax()){

            return view('empresa.add', compact('empresa'))->renderSections()['content'];
        }
   
        return view('empresa.add')->with('empresa', $empresa);
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
        //
        $rules = array(
            'descripcion' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
             if($request->ajax()){
                return false;
            }else{
            return Redirect::to('add-empresa')
                ->withErrors($validator);
            }
        }
        else {

            $empresa = new Empresa;
            
            if($request->ajax()){
                
                $empresa->descripcion       = $request->descripcion;
                $empresa->vigente           = 1; //DEFAULT VALUE
                $empresa->fecha_facturacion = date(now());
                $empresa->ultimo_pago       = date(now());
                $empresa->created_at        = date(now());

                if($empresa->save()) {
                    return array('success' => true, 'id' => $empresa->id);
                }

            }else {

                $empresa->descripcion       = $request->descripcion;
                $empresa->vigente           = 1; //DEFAULT VALUE
                $empresa->fecha_facturacion = date(now());
                $empresa->ultimo_pago       = date(now());
                $empresa->created_at        = date(now());

                $empresa->save();
                return Redirect::to('administracion/dashboard/empresas')->with('message', 'Empresa agregada.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(int $empresa)
    {
        //
        $empresa = Empresa::find($empresa);
        return view('empresa.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
        $rules = array(
            'descripcion' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add-construccion')
                ->withErrors($validator);
        }
        else {
            $empresa = Empresa::find($request->id);
            $empresa->descripcion = $request->descripcion;
            $empresa->save();
            return Redirect::to('administracion/dashboard/empresas')->with('message', 'Empresa editada exitosamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
