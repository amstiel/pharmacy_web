<?php

namespace App\Http\Controllers;

use App\Category;
use App\Drug;
use App\Provider;
use App\Sale;
use App\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function providersByCities()
    {
        $providers = Provider::all();
        $cities = [];
        foreach ($providers as $provider) {
            if (!in_array($provider->city, $cities)) {
                array_push($cities, $provider->city);
            }
        }
        return view('reports.providers', ['cities' => $cities, 'providers' => $providers]);
    }

    public function pricelist()
    {
        $categories = Category::all();
        $drugs = Drug::all();
        return view('reports.pricelist', [
            'categories' => $categories,
            'drugs' => $drugs,
        ]);
    }

    public function receipt($id)
    {
        $sale = Sale::find($id);
        return view('reports.receipt', ['sale' => $sale]);
    }

    public function sales()
    {
        $months = [
            1 => 'Январь',
            2 => 'Февраль',
            3 => 'Март',
            4 => 'Апрель',
            5 => 'Май',
            6 => 'Июнь',
            7 => 'Июль',
            8 => 'Август',
            9 => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь',
        ];
        $params = request()->all();
        $max_year = now()->year;
        $min_year = now()->year - 4;
        $year = array_key_exists('year', $params) ? $params['year'] : $max_year;
        if ($year > $max_year) $year = $max_year;
        $currentMonth = now()->month;
        $sales = Sale::whereYear('created_at', $year)->get();

//        $transactions = Transaction::whereYear('created_at', $year)->get();
        $formattedSales = [];

//        foreach ($transactions as $transaction) {
//            if(!array_key_exists($transaction->created_at->month, $formattedTransactions)) {
//                $formattedTransactions[$transaction->created_at->month] = [];
//                array_push($formattedTransactions[$transaction->created_at->month], $transaction);
//            } else {
//                array_push($formattedTransactions[$transaction->created_at->month], $transaction);
//            }
////            $formattedTransactions[$transaction->created_at->month] = $transaction
//        }

        foreach ($sales as $sale) {
            if(!array_key_exists($sale->created_at->month, $formattedSales)) {
                $formattedSales[$sale->created_at->month] = [];
                array_push($formattedSales[$sale->created_at->month], $sale);
            } else {
                array_push($formattedSales[$sale->created_at->month], $sale);
            }
//            $formattedTransactions[$transaction->created_at->month] = $transaction
        }

//        dd($formattedTransactions);

        return view('reports.sales', [
            'year' => $year,
            'max_year' => $max_year,
            'min_year' => $min_year,
            'sales' => $formattedSales,
            'months' => $months,
            'current_month' => $currentMonth,
        ]);
    }
}
