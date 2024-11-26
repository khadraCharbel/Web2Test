<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Employee::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp = new Employee();
        $emp->firstname=$request->firstname;
        $emp->lastname=$request->lastname;
        $emp->telephone=$request->telephone;
        $emp->address=$request->address;
        $emp->save();

        return "ok stored";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Employee::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Employee::find($id);
        $data->fill($request->all());
        $data->save();
        return 'ok updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Employee::findOrFail($id);
        $data->delete();
        return 'ok deleted';
    }
    public function listEmp(){
        $data=Employee::all();
        return view('EmployeeList',['data'=>$data]);
    }
}
