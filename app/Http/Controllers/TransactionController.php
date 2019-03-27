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
        $transactions = Transaction::orderBy('created_at')->get();

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

    public function refresh(Request $request)
    {
        $transaction = Transaction::where('created_at', $request->input('date'))
            ->where('drug_id', $request->input('drug_id'))->get()->last()
            ? Transaction::where('created_at', $request->input('date'))
                ->where('drug_id', $request->input('drug_id'))->get()->last()
            : new Transaction();

        $requestRevenue = $request->input('revenue') ? $request->input('revenue') : 0;
        $requestExpense = $request->input('expense') ? $request->input('expense') : 0;

        $newRevenue = $transaction->revenue
            ? $transaction->revenue + $requestRevenue
            : $requestRevenue;

        $newExpense = $transaction->expense
            ? $transaction->expense + $requestExpense
            : $requestExpense;

        $transaction->created_at = $request->input('date');
        $transaction->revenue = $newRevenue;
        $transaction->drug_id = $request->input('drug_id');
        $transaction->expense = $newExpense;
        $transaction->timestamps = false;
        $transaction->save();

        $drug = Drug::find($request->input('drug_id'));
        $newDrugBalance = ($drug->balance + ($newRevenue - $newExpense)) > 0
            ? $drug->balance + ($newRevenue - $newExpense)
            : 0;
        $drug->balance = $newDrugBalance;
        $drug->timestamps = false;
        $drug->save();

        return redirect('/transactions');
    }

    public function remove(Request $request)
    {
        $transaction = Transaction::where('created_at', $request->input('date'))
            ->where('drug_id', $request->input('drug_id'))->get()->last()
            ? Transaction::where('created_at', $request->input('date'))->get()->last()
            : new Transaction();

        $newExpense = $transaction->expense
            ? $transaction->revenue + $request->input('amount')
            : $request->input('amount');

        $transaction->created_at = $request->input('date');
        $transaction->revenue = $transaction->revenue;
        $transaction->drug_id = $request->input('drug_id');
        $transaction->expense = 0;
        $transaction->timestamps = false;
        $transaction->save();

        return redirect('/transactions');
    }

    public function showAdd()
    {
        $drugs = Drug::all();
        return view('transactions.add', ['drugs' => $drugs]);
    }

    public function showRemove()
    {
        $drugs = Drug::all();
        return view('transactions.remove', ['drugs' => $drugs]);
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
