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

    public function store()
    {
        Employee::create(request(['firstName', 'lastName', 'email', 'phoneNumber', 'address', 'startDate', 'endDate']));

        return redirect('/employees');
    }
}
