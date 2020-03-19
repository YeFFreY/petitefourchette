<?php

namespace App\Http\Controllers;

use App\CashBook;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CashBook $cashbook)
    {
        $attributes = $this->validateRequest();

        if( $attributes['type'] == 'INCOME') {
            $cashbook->addIncome($attributes['description'], $attributes['amount']);
        } else if ( $attributes['type'] == 'EXPENSE') {
            $cashbook->addExpense($attributes['description'], $attributes['amount']);
        } 
        return redirect($cashbook->path());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    
    protected function validateRequest()
    {
        return request()->validate([
            'type' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric'
        ]);
    }
}
