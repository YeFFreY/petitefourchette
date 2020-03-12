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

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => '',
            'address' => '',
            'start_date' => 'required',
            'end_date' => ''
        ]);

        $attributes['created_by'] = auth()->id();

        Employee::create($attributes);

        return redirect('/employees');
    }
}
