<?php

namespace App\Http\Controllers;

use App\Sucursal;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sucursales = Sucursal::paginate(15);
        return view('sucursal.index')
            ->with('sucursales', $sucursales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sucursal = new Sucursal;
        $data = array(
            'sucursal' => $sucursal,
            'empresas' => Empresa::pluck('descripcion', 'id')
        );
        return view('sucursal.add')->with('data', $data);
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
            'sucursal_name' => 'required',
            'empresas' => 'required',
            'expired_on' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return Redirect::to('add-sucursal')
                ->withErrors($validator);
        }
        else {
            $surcusal = new Sucursal;
            $surcusal->sucursal_name = $request->sucursal_name;
            $surcusal->empresa_id = $request->empresas[0];
            $surcusal->expired_on = $request->expired_on;
            $surcusal->save();
            return Redirect::to('bodega/dashboard/sucursales')->with('message', 'Sucursal agregada.');
        }
    }

    /**
     * Muestra formulario para editar sucursal.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(int $sucursal)
    {
        $sucursal = Sucursal::find($sucursal);
        $data = array(
            'sucursal' => $sucursal,
            'empresas' => Empresa::pluck('descripcion', 'id')
        );
        return view('sucursal.edit')->with('data', $data);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $sucursal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        //
    }
}
