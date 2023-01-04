<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Beneficiarios;

class BeneficiariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiarios=Beneficiarios::all();
        return view('BeneficiariosView/index',compact('beneficiarios'));
    }
    public function pdf()
    {
        $beneficiarios=Beneficiarios::all();;
        $pdf =PDF::loadView('pdf.listado',compact('beneficiarios'));
        return $pdf->download('listado.pdf');
    }
    public function mostrar()
    {
        $beneficiarios=Beneficiarios::all();
        return view('BeneficiariosView/principal',compact('beneficiarios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BeneficiariosView/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /*return $request->all();
        return$request->input("name");
       */
        /*$trainer=new Trainer();
        $trainer->name=$request->input('name');
        $trainer->Apellido=$request->input('Apellido');
        $trainer->Avatar=$request->input('Avatar');
        $trainer->save();
        return 'Guardado';
        return $name;
        */
        /*return $request->all();*/
        if ($request->hasFile('CredencialLector')){
            $file= $request->file('CredencialLector');
            $NombreCompleto=time().$file-> getClientOriginalName();
            $file->move(public_path().'/images/',$NombreCompleto);

            $beneficiario=new Beneficiarios();
            $beneficiario->NombreCompleto=$request->input('NombreCompleto');
            $beneficiario->FechaNacimiento=$request['FechaNacimiento'];
            $beneficiario->Domicilio=$request->input('Domicilio');
            $beneficiario->ProgramaBeneficiado=$request->input('ProgramaBeneficiado');
            $beneficiario->NumeroTelefono=$request->input('NumeroTelefono');
            $beneficiario->FechaAceptacion=$request['FechaAceptacion'];
            $beneficiario->Curp=$request->input('Curp');       
            
            $beneficiario->CredencialLector=$NombreCompleto;
            $beneficiario->save();
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
         /*$trainer=Trainer::find($id);
        return $trainer;*/
        $beneficiario=Beneficiarios::find($id);
        return view('show',compact('BeneficiariosView/beneficiario'));
    
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiarios $beneficiario)
    {
        return view('BeneficiariosView/edith',compact('beneficiario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Beneficiarios $beneficiario)
    {
         //Añadido el 04/10/22
         $beneficiario->fill($request->except('CredencialLector'));
         if ($request->hasFile('CredencialLector')){
             $file= $request->file('CredencialLector');
             $Nombre=time().$file-> getClientOriginalName();
             
 
         //Imagen
         $beneficiario->CredencialLector=$Nombre;
         $file->move(public_path(  ).'/images',$Nombre);
         }   
         $beneficiario->save();
         return redirect('beneficiarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             //
       /* $trainer=Trainer::find($id);
        if($trainer->delete($id))
        {
            return redirect('trainers/');
        }
        else return 'El'.$id."No se pudo borrar"; */
       /* if($trainer->delete($id))
        {
            return redirect('trainers/');
        }
        else return 'El'.$id."No se pudo borrar"; */

        $data=Beneficiarios::FindOrFail($id);
        $beneficiario= Beneficiarios::find($id);

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
        if ($beneficiario->delete($id)){
            //return 'El'.$id. "Si se pudo borrar";
            return redirect('/beneficiarios');
        }
            else {return 'El'.$id. "No se pudo borrar";}

      
    }
}
