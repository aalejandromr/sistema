<?php

namespace App\Http\Controllers;

use App\EjeDistribucion;
use App\Distribution;
use Illuminate\Http\Request;

class EjeDistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        //
        $ejes = 
        EjeDistribucion::where(['distribution_id' => $id])
        ->orderBy("distribution_position_id", "ASC")
        ->orderBy("posicion", "ASC")
        ->get();
        $eje = Distribution::find($id)->name;
        $data = array(
            "ejes" => $ejes,
            "eje_name" => $eje
        );
        return view('distribution.showEjes')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\eje_distribution  $eje_distribution
     * @return \Illuminate\Http\Response
     */
    public function show(eje_distribution $eje_distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eje_distribution  $eje_distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(eje_distribution $eje_distribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eje_distribution  $eje_distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $eje_distribution)
    {
        //
        $obj = $request["data"];
        //dd($obj);
        foreach ($obj as $value) {
            //$ejeDistribution = EjeDistribucion::find($value[0]);
            //$ejeDistribution->eje_id = $value[1];
            //$ejeDistribution->distribution_id = $value[2];
            //$ejeDistribution->posicion = $value[3];
            //$ejeDistribution->distribution_position_id = $value[4];
            //$ejeDistribution->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eje_distribution  $eje_distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(eje_distribution $eje_distribution)
    {
        //
    }
}
