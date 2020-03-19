<?php

namespace App\Http\Controllers;

use App\CashBook;
use App\Http\Requests\StartCashbook;
use App\Transaction;
use Illuminate\Http\Request;

class CashBookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashbooks = CashBook::all();

        return view('cashbooks.index', compact('cashbooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cashbook = new CashBook;
        return view('cashbooks.create', compact('cashbook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StartCashbook $startCashbookRequest)
    {
        $attributes = $startCashbookRequest->validated();

        $attributes['created_by'] = auth()->id();
        $attributes['start_at'] = now();

        $cashbook = CashBook::create($attributes);
        $cashbook->addIncome('Initial Balance', $attributes['initial_balance']);

        return redirect('/cashbooks')->with('success', 'caisse saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function show(CashBook $cashbook)
    {
        return view('cashbooks.show', compact('cashbook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function edit(CashBook $cashBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashBook $cashBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashBook $cashBook)
    {
        //
    }

    protected function validateRequest()
    {
        return request()->validate([
            'service_id' => 'required'
        ]);
    }
}
