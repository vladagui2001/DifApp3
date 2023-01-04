<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Difregister;

class DifUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // añadido el 10-10-2022
        $User=Difregister::all();
        return view ('index',compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Añadido el 05-10-22 
        return view("create3");//
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
            'Genero' => 'required|in:Hombre,Mujer,Otro',
            'Discap' => 'required|in:Si,No',
            'NomApoyo' => 'required|in:MilDias,CincoAños,PersonasDiscp'
        ]);
        
            //Datos del formulario
            $User = new Difregister();
            $User->Nombre=$request->input('Nombre');
            $User->Curp=$request->input('Curp');
            $User->Genero = $request['Genero'];
            $User->NoDeHijos=$request->input('NoDeHijos');
            $User->Discap = $request['Discap'];
            $User->Nomdiscap=$request->input('Nomdiscap');
            $User->Ing_Men=$request->input('Ing_Men');
            $User->Nom_Apoyo = $request['NomApoyo'];
            //Imagen
            $User->save();
            return redirect('Users')->with('message', 'Operación Exitosa');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Difregister $User)
    {
        
        return view('show'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Difregister $User)
    {
        //añadido el 11-10-22
        return view('edit',compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //añadido el 11-10-22

        $User = Difregister::find($id);

        $User->Nombre=$request->input('Nombre');
        $User->Curp=$request->input('Curp');
        $User->Genero = $request['Genero'];
        $User->NoDeHijos=$request->input('NoDeHijos');
        $User->Discap = $request['Discap'];
        $User->Nomdiscap=$request->input('Nomdiscap');
        $User->Ing_Men=$request->input('Ing_Men');
        $User->Nom_Apoyo = $request['NomApoyo'];
        $User->Status=$request->input('Status');

        $input = $request->all();
        $User->update($input);
        return redirect('Users')->with('message', 'Operación Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Difregister::FindOrFail($id);
        $User = Difregister::find($id);

        try{
            $data->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }
        if($bug==0){
            echo "success";
        } else {
            echo 'error';
        }

        if ($User->delete($id)){
            //return 'El'.$id. "Si se pudo borrar";
            return redirect('Users')->with('message', 'Operación Exitosa');
        }
            else {return 'El beneficiario'.$Nombre. "No se pudo borrar";}
    }
    public function mostrar(Difregister $User)
    {
        //Añadido el 05-10-22 
        $User=Difregister::all();
        return view("mostraruser",compact('User'));//
    }

    public function mostrar2()
    {
        return view("index2");//
    }
    

///Funciones Extra
}
