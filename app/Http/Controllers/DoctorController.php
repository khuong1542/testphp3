<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Doctor::paginate(10);
        return view('doctors.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::all();
        return view('doctors.add-form', compact('hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $model = new Doctor();
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar')->store('doctor_image');
            $filename = str_replace('public/', '', $avatar);
            $model->avatar = $filename;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('doctors.index'));
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
        $model = Doctor::find($id);
        $hospitals = Hospital::all();
        return view('doctors.edit-form', compact('model', 'hospitals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, $id)
    {
        $model = Doctor::find($id);
        if(!$model){
            return back();
        }
        if($request->hasFile('avatar')){
            Storage::delete($model->avatar);
            $avatar = $request->file('avatar')->store('doctor_image');
            $filename = str_replace('public/', '', $avatar);
            $model->avatar = $filename;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('doctors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Doctor::find($id);
        if($model->logo != ''){
            Storage::delete($model->logo);
        }
        $model->delete();
        return redirect(route('doctors.index'));
    }
}
