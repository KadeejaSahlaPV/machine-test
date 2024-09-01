<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;

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
        return request()->all();
    }

    public function fetchDesignation()
    {
        $designations = Designation::where('department_id',request('department_id'))->get();
        return ['status'=>200,'data'=>$designations];

    }
}
