<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController
{
    public function list()
    {
        $employees = Employee::all();
        $departments = Department::all();
        return view('list',compact('employees','departments'));
    }

    public function save()
    {
        Employee::create([
            'name' => request('name'),
            'gender' => request('gender'),
            'dob' => date('Y-m-d',strtotime(request('dob'))),
            'address' => request('address'),
            'mobile' => request('mobile'),
            'email' => request('email'),
            'department_id' => request('department_id'),
            'designation_id' => request('designation_id'),
            'doj' => date('Y-m-d',strtotime(request('doj'))),
            'image' => request('image'),
        ]);
        $employees = Employee::with('designation','designation.department')->get();
        return ['status'=>200,'message'=>'Employee Created Successfully','data'=>$employees];
    }


    public function delete(Request $request)
    {
        Employee::find(decrypt(request('id')))->delete();
        $employees = Employee::with('designation','designation.department')->get();
        return ['status'=>200,'message'=>'Employee Deleted Successfully','data'=>$employees];

    }

    public function fetchDesignation()
    {
        $designations = Designation::where('department_id',request('department_id'))->get();
        return ['status'=>200,'data'=>$designations];

    }
}
