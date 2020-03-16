<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeEvaluation;
use Illuminate\Http\Request;

class EmployeeEvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee)
    {
        return view('employees.evaluations.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Employee $employee)
    {
        $attributes = $this->validateRequest();

        $employee->addEvaluation($attributes['body']);
        return redirect($employee->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeEvaluation $evaluation)
    {
        return view('employees.evaluations.edit', compact('evaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeEvaluation $evaluation)
    {
        $attributes = $this->validateRequest();

        $evaluation->update($attributes);

        return redirect($evaluation->employee->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeEvaluation $evaluation)
    {
        $employee = $evaluation->employee;
        $evaluation->delete();
        return redirect($employee->path());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'body' => 'required'
        ]);
    }
}
