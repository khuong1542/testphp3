<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalRequest;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Hospital::paginate(10);
        return view('hospitals.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospitals.add-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalRequest $request)
    {
        $model = new Hospital();
        if($request->hasFile('logo')){
            $logo = $request->file('logo')->store('hospital');
            $filename = str_replace('public/', '', $logo);
            $model->logo = $filename;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('hospitals.index'));
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
        $model = Hospital::find($id);
        return view('hospitals.edit-form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HospitalRequest $request, $id)
    {
        $model = Hospital::find($id);
        if(!$model){
            return back();
        }
        if($request->hasFile('logo')){
            Storage::delete($model->logo);
            $logo = $request->file('logo')->store('hospital');
            $filename = str_replace('public/', '', $logo);
            $model->logo = $filename;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('hospitals.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Hospital::find($id);
        if($model->logo != ''){
            Storage::delete($model->logo);
        }
        Doctor::where('hospital_id', $model->id)->delete();
        $model->delete();
        return redirect(route('hospitals.index'));
    }
}
