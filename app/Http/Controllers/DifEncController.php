<?php

namespace App\Http\Controllers;

use App\DifEncuesta;
use Illuminate\Http\Request;
use PDF;

class DifEncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $difEncuesta=DifEncuesta::all();
        return view ('EncuestasView/Resultados',compact('difEncuesta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('EncuestasView/Encuesta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //añadido el 10-10-2022
         $this->validate(request(), [
            'Pregunta1' => 'required|in:1,2,3,4,5,6,7,8,9,10',
            'Pregunta2' => 'required|in:1,2,3,4,5,6,7,8,9,10',
            'Pregunta3' => 'required|in:1,2,3,4,5,6,7,8,9,10',
            'Pregunta4' => 'required|in:1,2,3,4,5,6,7,8,9,10',
            'Pregunta5' => 'required|in:1,2,3,4,5,6,7,8,9,10',
            'Pregunta6' => 'required|in:1,2,3,4,5,6,7,8,9,10',
            'Pregunta7' => 'required|in:1,2,3,4,5,6,7,8,9,10',
            'Pregunta8' => 'required|in:1,2,3,4,5,6,7,8,9,10'
        ]);
        
            //Datos del formulario
            $difEncuesta = new DifEncuesta();
            $difEncuesta->Nombre=$request->input('Nombre');
            $difEncuesta->Pregunta1 = $request['Pregunta1'];
            $difEncuesta->Pregunta2 = $request['Pregunta2'];
            $difEncuesta->Pregunta3 = $request['Pregunta3'];
            $difEncuesta->Pregunta4 = $request['Pregunta4'];
            $difEncuesta->Pregunta5 = $request['Pregunta5'];
            $difEncuesta->Pregunta6 = $request['Pregunta6'];
            $difEncuesta->Pregunta7 = $request['Pregunta7'];
            $difEncuesta->Pregunta8 = $request['Pregunta8'];
            //Imagen
            $difEncuesta->save();
            return redirect('Users')->with('message', 'Operación Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DifEncuesta  $difEncuesta
     * @return \Illuminate\Http\Response
     */
    public function show(DifEncuesta $difEncuesta)
    {
        $difEncuesta=DifEncuesta::all();
        return view ('EncuestasView/Resultados',compact('difEncuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DifEncuesta  $difEncuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(DifEncuesta $difEncuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DifEncuesta  $difEncuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DifEncuesta $difEncuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DifEncuesta  $difEncuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(DifEncuesta $difEncuesta)
    {
        //
    }

    public function pdf()
    {
        $difEncuesta=DifEncuesta::all();
        //$pdf = PDF::loadView('pdf.listado', ['Data' => $Data])->setOptions(['defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('EncuestasView/EncuestaPDF',compact('difEncuesta'));
        return $pdf->download('ListadoEncuestas.pdf');
    }
}
