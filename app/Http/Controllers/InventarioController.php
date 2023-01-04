<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventario;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventario=Inventario::all();
        return view('BeneficiariosView/indexI',compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BeneficiariosView/createI');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
           
            $inventario=new Inventario();
            $inventario->NameApoyo=$request->input('NameApoyo');
            $inventario->NumeroDespensas=$request->input('NumeroDespensas');
            
            
            $inventario->save();
            return 'Guardado';
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventario=Inventario::find($id);
        return view('BeneficiariosView/showI',compact('inventario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        return view('BeneficiariosView/editI',compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $inventario->fill($request->except('CredencialLector'));
        if ($request->hasFile('CredencialLector')){
            $file= $request->file('CredencialLector');
            $Nombre=time().$file-> getClientOriginalName();
            

        //Imagen
        $inventario->CredencialLector=$Nombre;
        $file->move(public_path(  ).'/images',$Nombre);
        }   
        $inventario->save();
        return redirect('/inventario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=inventario::FindOrFail($id);
        $inventario= Inventario::find($id);

        if(file_exists('images/'.$data->CredencialLector)AND !empty($data->CredencialLector)){
            unlink('images/'.$data->CredencialLector);
        }
        try{
            $data->delete();
            $bug=0;
        }
        catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            echo"success";
        }else{
            echo'error';
        }
        if ($inventario->delete($id)){
            //return 'El'.$id. "Si se pudo borrar";
            return redirect('/inventario');
        }
            else {return 'El'.$id. "No se pudo borrar";}
    }
}
