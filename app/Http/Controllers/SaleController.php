<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Sale;
use App\SaleDrug;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create() {

        $drugs = Drug::where('balance', '>', 0)->get();

        return view('create-sale', [
            'drugs' => $drugs
        ]);
    }

    public function store(Request $request) {
        $saleDate = Carbon::now()->format('Y-m-d');

        $sale = new Sale();
        $sale->created_at = $saleDate;
        $sale->timestamps = false;
        $sale->save();
        $saleId = $sale->id;

        foreach ($request->input('drug_id') as $index => $drugId) {
            $amount = $request->input('amount')[$index];
            $saleDrug = new SaleDrug();
            $saleDrug->sale_id = $saleId;
            $saleDrug->drug_id = $drugId;
            $saleDrug->amount = $amount;
            $saleDrug->timestamps = false;
            $saleDrug->save();

            $drug = Drug::find($drugId);
            $newBalance = ($drug->balance - $amount) > 0 ? ($drug->balance - $amount) : 0;
            $drug->balance = $newBalance;
            $drug->timestamps = false;
            $drug->save();

            $transaction = Transaction::where('created_at', $saleDate)
                ->where('drug_id', $drugId)->get()->last()
                ? Transaction::where('created_at',$saleDate)
                    ->where('drug_id', $drugId)->get()->last()->get()->last()
                : new Transaction();

            $newRevenue = $transaction->revenue
                ? $transaction->revenue
                : 0;
            $newExpense = $transaction->expense
                ? $transaction->expense + $amount
                : $amount;

            $transaction->created_at = $saleDate;
            $transaction->revenue = $newRevenue;
            $transaction->drug_id = $drugId;
            $transaction->expense = $newExpense;
            $transaction->timestamps = false;
            $transaction->save();
        }

        return redirect('/');
    }
}
