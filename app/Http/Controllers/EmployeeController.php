<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        //get
        $employees = Employee::all();

        return view('components.index', [
            'employees' => $employees,
        ]);
        
        // return view('components.index');
    }
    public function contacts()
    {
        //
        return view('components.contacts');
    }

    public function create()
    {
        //get
        return view('components.create');
    }

    public function store(Request $request)
    {
        //post
        $data = $request->validate([
            'firstName' => 'required', 'string', 'regex:/^[a-zA-Z\s]+$/',
            'lastName' => 'required', 'string', 'regex:/^[a-zA-Z\s]+$/',
            'address' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required', 'integer',
        ]);
        $data['status'] = 'Active';
        Employee::create($data);
        return redirect()->route('index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        //get
    }

    public function edit(Employee $employee)
    {
        //get
        return view('components.edit', ['employee' => $employee]);
    }


    public function update(Request $request, Employee $employee)
    {
        //put
        $data = $request->validate([
            'firstName' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'min:2'],
            'lastName' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'min:2'],
            'address' => 'required',
            'phone' => 'nullable|regex:/^[0-9]{10,}$/',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'status' => 'required|in:Active,Inactive'
            ]);
        
        $employee->update($data);
        return redirect()->route('index')->with('success', 'Employee created successfully.');

    }


    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->route('index')->with('success', 'Employee Deleted successfully.');
    }
}
