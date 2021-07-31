<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetch = Employee::with('department')->get();

        return view('Employee.index',compact('fetch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fetchDepartment = Department::all();
        return view('employee.create', compact('fetchDepartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $fileNameToStore = 'noImage.png';
        if($request->hasFile('pic')) {
        $fullname = $request->file('pic')->getClientOriginalName();
        $onlyName = Pathinfo($fullname, PATHINFO_FILENAME);
        $extension = $request->file('pic')->extension();
        $fileNameToStore = $onlyName.'_'.time().'.'.$extension;
        $request->file('pic')->storeAs('public/myFolder',$fileNameToStore);
        }


        $request->validate([
            'department_id' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|integer',
            'gender' => 'required|string',
            'status' => 'required|string',
            'blood_group' => 'required|string'
        ]); 

        $newEmployee = new Employee;
        $newEmployee->department_id = $request->department_id;
        $newEmployee->first_name = $request->first_name;
        $newEmployee->last_name = $request->last_name;
        $newEmployee->position = $request->position;
        $newEmployee->salary = $request->salary;
        $newEmployee->gender = $request->gender;
        $newEmployee->status = $request->status;
        $newEmployee->blood_group = $request->blood_group;
        $newEmployee->image_path = $fileNameToStore;
        $newEmployee->save();
        return redirect('/employee');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show')->with('employee',$employee);
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $fetchDepartment = Department::all();
        return view('employee.edit')->with('fetchDepartment', $fetchDepartment)
        ->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $fileNameToStore = $employee->image_path;
        if($request->hasFile('pic')) {
            if($employee->image_path != 'noImage.png') {
            Storage::delete('/public/myFolder/'.$employee->image_path);
            }
            $fullname = $request->file('pic')->getClientOriginalName();
            $onlyName = Pathinfo($fullname, PATHINFO_FILENAME);
            $extension = $request->file('pic')->extension();
            $fileNameToStore = $onlyName.'_'.time().'.'.$extension;
            $request->file('pic')->storeAs('public/myFolder',$fileNameToStore);
        }
        $request->validate([
            'department_id' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|integer',
            'gender' => 'required|string',
            'status' => 'required|string',
            'blood_group' => 'required|string'
        ]); 
      dd($request);
        $newEmployee->department_id = $request->department_id;
        $newEmployee->first_name = $request->first_name;
        $newEmployee->last_name = $request->last_name;
        $newEmployee->position = $request->position;
        $newEmployee->salary = $request->salary;
        $newEmployee->gender = $request->gender;
        $newEmployee->status = $request->status;
        $newEmployee->blood_group = $request->blood_group;
        $newEmployee->image_path = $fileNameToStore;
        $newEmployee->save();
        return redirect('/employee');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if($employee->image_path != 'noImage.png') {
        Storage::delete('/public/myFolder/'.$employee->image_path);
        }
        $employee->delete();
        Session::flash('success','The employee deleted successfully');
        return redirect('/employee');
    }
}
