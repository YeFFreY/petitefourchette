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

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function incomes()
    {
        return $this->transactions()->where('type', 'INCOME')->get();
    }

    public function expenses()
    {
        return $this->transactions()->where('type', 'EXPENSE')->get();
    }

    public function addIncome($description, $amount)
    {
        return $this->addTransaction('INCOME', $description, $amount);
    }

    public function addExpense($description, $amount)
    {
        return $this->addTransaction('EXPENSE', $description, $amount);
    }

    private function addTransaction($type, $description, $amount)
    {
        $transaction = new Transaction([
            'type' => $type,
            'description' => $description,
            'amount' => $amount
        ]);

        return $this->transactions()->save($transaction);
    }
}
