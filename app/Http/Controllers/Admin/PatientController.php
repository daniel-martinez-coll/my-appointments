<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::patients()->paginate(5);
        return view('patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'min:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6',
        ];
        $this->validate($request,$rules);

        $patient = new User();
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->password = bcrypt($request->input('password'));
        $patient->dni = $request->input('dni');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->role = 'patient';
        $patient->save(); 

        return redirect('patients')->with('notification','El Paciente fue registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('patients.edit',['patient' => User::patients()->findOrFail($id) ]);
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
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'min:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6',
        ];
        $this->validate($request,$rules);

        $patient = User::patients()->findOrFail($id);

        $patient->name = $request->input('name');
        $patient->email = $request->input('email');

        if($request->input('password')){
        $patient->password = bcrypt($request->input('password'));
        }

        $patient->dni = $request->input('dni');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');

        $patient->save(); 

        return redirect('patients')->with('notification','El paciente fue modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $patient)
    {
        $nombre= $patient->name;
        $patient->delete();
        return redirect('/patients')->with('notification','La especialidad '.$nombre.' la sido eliminada.');
    }
}
