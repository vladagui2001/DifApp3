<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Difuserlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use PDF;

class DifUserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // añadido el 11-10-2022
        $RegUser=Difuserlogin::all();
        return view ('RegisterUsers.RegUsmostrar',compact('RegUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // añadido el 11-10-2022
        return view("RegisterUsers.RegUscreate");//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //añadido el 11-10-2022
        $this->validate(request(), [
            'Genero' => 'required|in:Hombre,Mujer,Otro'
        ]);

        if ($request->hasFile('Avatar')){
            $file= $request->file('Avatar');
            $Nombre=time().$file-> getClientOriginalName();
            $file->move(public_path().'/images/',$Nombre);
        
            //Datos del formulario
            $RegUser = new Difuserlogin();
            $RegUser->Nombre=$request->input('Nombre');
            $RegUser->Username=$request->input('Username');
            $RegUser->Curp=$request->input('Curp');
            $RegUser->FechaNac=$request['FechaNac'];
            $RegUser->Password=$request['Password'];
            $RegUser->Genero=$request['Genero'];

            //Imagen
            $RegUser->Avatar=$Nombre;
            $RegUser->save();
            return redirect('Users')->with('message', 'Operación Exitosa');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Difuserlogin  $difuserlogin
     * @return \Illuminate\Http\Response
     */
    public function show(Difuserlogin $difuserlogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Difuserlogin  $difuserlogin
     * @return \Illuminate\Http\Response
     */
    public function edit(Difuserlogin $RegUser)
    {
        return view ('RegisterUsers.RegUsedit',compact('RegUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Difuserlogin  $difuserlogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Difuserlogin $RegUser)
    {
        $RegUser->fill($request->except('Avatar'));
        if ($request->hasFile('Avatar')){
            $file= $request->file('Avatar');
            $Nombre=time().$file-> getClientOriginalName();
            

        //Imagen
        $RegUser->Avatar=$Nombre;
        $file->move(public_path(  ).'/images',$Nombre);
        }   
        $RegUser->save();
        return redirect('Users')->with('message', 'Operación Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Difuserlogin  $difuserlogin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Añadido el 12-10-22
        $data = Difuserlogin::FindOrFail($id);
        $RegUser= Difuserlogin::find($id);

        if(file_exists('images/'.$data->Avatar) AND !empty($data->Avatar)){
            unlink('images/'.$data->Avatar);
            File::delete($data->Avatar);
        }
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

        if ($RegUser->delete($id)){
            //return 'El'.$id. "Si se pudo borrar";
            return redirect('Users')->with('message', 'Operación Exitosa');
        }
            else {return 'El usuario'.$Username. "No se pudo borrar";}
    }
    public function mostrar(Difuserlogin $RegUser)
    {
        //Añadido el 05-10-22 
        $RegUser=Difuserlogin::all();
        return view("RegisterUsers/RegUsmostrar",compact('RegUser'));//
    }

    public function pdf()
    {
        $RegUser=Difuserlogin::all();
        //$pdf = PDF::loadView('pdf.listado', ['Data' => $Data])->setOptions(['defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('RegisterUsers/RegUserPDF',compact('RegUser'));
        return $pdf->download('ListadoUsuarios.pdf');
    }
    
}
