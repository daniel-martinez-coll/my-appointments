<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::doctors()->get();
        return view('doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->dni = $request->input('dni');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->role = 'doctor';
        $user->save(); 

        return redirect('doctors')->with('notification','El Médico fue registrado correctamente.');

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
        return view('doctors.edit',['doctor' => User::doctors()->findOrFail($id) ]);
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

        $user = User::patients()->findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->input('password')){
        $user->password = bcrypt($request->input('password'));
        }

        $user->dni = $request->input('dni');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        $user->save(); 

        return redirect('patients')->with('notification','El Paciente fue modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $nombre= $doctor->name;
        $doctor->delete();
        return redirect('/doctors')->with('notification','La especialidad '.$nombre.' la sido eliminada.');
    }
}
