<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEvaluation extends Model
{
    protected $table = 'employee_evaluations';
    protected $fillable = ['body'];

    public function path()
    {
        return "/evaluations/{$this->id}";
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
