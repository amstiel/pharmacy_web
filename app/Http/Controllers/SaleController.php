<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Sale;
use App\SaleDrug;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create() {

        $drugs = Drug::all();

        return view('create-sale', [
            'drugs' => $drugs
        ]);
    }

    public function store(Request $request) {
        $sale = new Sale();
        $sale->created_at =  Carbon::now()->format('Y-m-d');
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
        }

        return redirect('/');
    }
}
