<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Employee $employee)
    {
        $attributes = $this->validateRequest();

        $employee->update($attributes);

        return redirect($employee->path());
    }

    public function store()
    {
        $attributes = $this->validateRequest();

        $attributes['created_by'] = auth()->id();

        Employee::create($attributes);

        return redirect('/employees')->with('success', 'Employee saved!');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => '',
            'address' => '',
            'start_date' => 'date|required',
            'end_date' => 'nullable|date'
        ]);
    }
}
