<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'phoneNumber', 'address', 'startDate', 'endDate'];
}
