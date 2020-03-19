<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['type', 'description', 'amount'];

    public function path()
    {
        return "/transactions/{$this->id}";
    }

    public function cashbook()
    {
        return $this->belongsTo('App\CashBook');
    }
}
