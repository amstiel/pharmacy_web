<?php

namespace App\Http\Controllers;

use App\Category;
use App\Drug;
use App\Provider;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions.index', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drugs = Drug::all();
        return view('transactions.create', ['drugs' => $drugs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Transaction $transaction)
    {
        $attributes = request()->validate([
            'drug_id' => 'required',
            'date' => 'required',
            'amount' => 'required',
        ]);

        $transaction->drug_id = $attributes['drug_id'];
        $transaction->created_at = $attributes['date'];
        $transaction->amount = $attributes['amount'];
        $transaction->timestamps = false;
        $transaction->save();

        return redirect('/transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', ['transaction' => $transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $drugs = Drug::all();
        return view('transactions.edit', ['transaction' => $transaction, 'drugs' => $drugs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Transaction $transaction)
    {
        $attributes = request()->validate([
            'drug_id' => 'required',
            'date' => 'required',
            'amount' => 'required',
        ]);

        $transaction->drug_id = $attributes['drug_id'];
        $transaction->created_at = $attributes['date'];
        $transaction->amount = $attributes['amount'];
        $transaction->timestamps = false;
        $transaction->save();

        return redirect('/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect('/transactions');
    }
}
