<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
            'doj' => Carbon::parse(request('doj'))->format('y-m-d'),
            'image' => request('image'),
        ]);
        $employees = Employee::with('designation','designation.department')->get();
        return ['status'=>200,'message'=>'Employee Created Successfully','data'=>$employees];
    }

    public function edit(Request $request)
    {
        $id = Crypt::decrypt($request->id);

      $employee = Employee::find($id);

    if ($employee) {
        return response()->json([
            'status' => 'success',
            'data' => $employee
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Employee not found'
        ]);
    }
    }


    public function update(Request $request)
    {
        if ($request->id) {
        $employee = Employee::find($request->id);

        if ($employee) {
            $employee->name = $request->name;
            $employee->gender = $request->gender;
            $employee->dob = $request->dob;
            $employee->address = $request->address;
            $employee->mobile = $request->mobile;
            $employee->email = $request->email;
            $employee->department_id = $request->department_id;
            $employee->designation_id = $request->designation_id;
            $employee->doj = $request->doj;

            $employee->save();

            return response()->json([
                'status' => 200,
                'message' => 'Employee updated successfully',
                'data' => Employee::all()
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found'
            ]);
        }
    }
    else {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->address = $request->address;
        $employee->mobile = $request->mobile;
        $employee->email = $request->email;
        $employee->department_id = $request->department_id;
        $employee->designation_id = $request->designation_id;
        $employee->doj = $request->doj;

        $employee->save();

        return response()->json([
            'status' => 200,
            'message' => 'Employee created successfully',
            'data' => Employee::all()
        ]);
    }

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
