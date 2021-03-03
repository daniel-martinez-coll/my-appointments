<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{

    public function index(){
        $specialities = Specialty::all();
    	return view('specialties.index',compact('specialities'));
    }

    public function create(){
    	return view('specialties.create');
    }

    private function performValidation(Request $request){
        $rules=[
            "name" => 'required|min:3',
            "description" => 'required|min:10'
        ];
        $messages=[
            'name.required'=>'Es necesario ingresar un nombre',
            'name.min' =>'Debe ingresar como minimo 3 caracteres.',
            'description.required'=>'Es necesario ingresar una descripción',
            'description.min' =>'Debe ingresar como minimo 10 caracteres.',
        ];
        
        $this->validate($request, $rules,$messages);
    }

    public function store(Request $request){
    	//dd($request->all());
    	
        $this->performValidation($request);
    	$specialty = new Specialty();
    	$specialty->name = $request->input('name');
    	$specialty->description = $request->input('description');
    	$specialty->save(); 

    	return redirect('/specialties')->with('notification','La especialidad de ha registrado correctamente.');
    }

    public function edit($id)
    {    
        return view('specialties.edit',['specialty' => Specialty::findOrFail($id) ]);
    }

    public function update(Request $request, Specialty $specialty){
    	//dd($request->all());
    	$this->performValidation($request);    	
    	$specialty->name = $request->input('name');
    	$specialty->description = $request->input('description');
    	$specialty->save(); 
    	return redirect('/specialties')->with('notification','La especialidad ha sido actualizada.');
    }

    public function destroy($id){
        $nombre=Specialty::findOrFail($id);
        $specialities = Specialty::destroy($id);
        return redirect('/specialties')->with('notification','La especialidad '.$nombre->name.'ha sido eliminada.');
    }
}
