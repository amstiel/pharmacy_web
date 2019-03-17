<?php

namespace App\Http\Controllers;

use App\Category;
use App\Drug;
use App\Provider;
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
}
