<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\APvigentes;

class APvigentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apvigentes=APvigentes::all();
        return view('BeneficiariosView/indexAP',compact('apvigentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BeneficiariosView/createAP');
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
           
            $apvigentes=new APvigentes();
            $apvigentes->NombreDeApoyo=$request->input('NombreDeApoyo');
            $apvigentes->PeriodoDeDuracion=$request->input('PeriodoDeDuracion');
            
            
            $apvigentes->save();
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
        $apvigentes=APvigentes::find($id);
        return view('BeneficiariosView/showAP',compact('apvigentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $apvigentes = APvigentes::find($id);
        return view('BeneficiariosView/editAP',compact('apvigentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $apvigentes = APvigentes::find($id);

        $apvigentes->NombreDeApoyo=$request->input('NombreDeApoyo');
        $apvigentes->PeriodoDeDuracion=$request->input('PeriodoDeDuracion');

        $input = $request->all();
        $apvigentes->update($input);
        return redirect('BeneficiariosView/apvigentes');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data=apvigentes::FindOrFail($id);
        $apvigentes= APvigentes::find($id);
        
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
        if ($apvigentes->delete($id)){
            //return 'El'.$id. "Si se pudo borrar";
            return redirect('/apvigentes');
        }
            else {return 'El'.$id. "No se pudo borrar";}
    }
}
