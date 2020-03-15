<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';
    protected $fillable = ['name', 'reference'];

    public function path()
    {
        return "/equipments/{$this->id}";
    }

}
