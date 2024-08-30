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
        $designations = Designation::all();
        return view('list',compact('employees','departments','designations'));
    }

    public function save()
    {
        return request()->all();
    }
}
