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

    public function store()
    {
        $attributes = request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phoneNumber' => '',
            'address' => '',
            'startDate' => 'required',
            'endDate' => ''
        ]);

        Employee::create($attributes);

        return redirect('/employees');
    }
}
