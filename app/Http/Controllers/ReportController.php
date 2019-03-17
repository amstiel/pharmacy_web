<?php

namespace App\Http\Controllers;

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
}
