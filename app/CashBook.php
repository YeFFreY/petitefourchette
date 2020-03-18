<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashBook extends Model
{
    protected $table = 'cash_books';
    protected $fillable = ['start_at', 'end_at', 'service_id', 'created_by'];
    protected $dates = ['start_at', 'end_at'];

    public function path()
    {
        return "/cashbooks/{$this->id}";
    }

}
