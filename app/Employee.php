<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'address', 'start_date', 'end_date', 'created_by'];

    public function path()
    {
        return "/employees/{$this->id}";
    }
}
