<?php

namespace App\Http\Controllers;

use App\Category;
use App\Drug;
use App\Provider;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function index() {
        $drugs = Drug::all();

        return view('drugs.index', [
            'drugs' => $drugs
        ]);
    }

    public function create() {
        $providers = Provider::all();
        $categories = Category::all();
        return view('drugs.create', [
            'providers' => $providers,
            'categories' => $categories
        ]);
    }

    public function store(Drug $drug)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'provider_id' => 'required',
            'measure' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $drug->title = $attributes['title'];
        $drug->provider_id = $attributes['provider_id'];
        $drug->measure = $attributes['measure'];
        $drug->price = $attributes['price'];
        $drug->category_id = $attributes['category_id'];
        $drug->timestamps = false;
        $drug->save();

        return redirect('/drugs');
    }

    public function edit(Drug $drug)
    {
        $providers = Provider::all();
        $categories = Category::all();
        return view('drugs.edit', [
            'drug' => $drug,
            'providers' => $providers,
            'categories' => $categories,
        ]);
    }

    public function update(Drug $drug)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'provider_id' => 'required',
            'measure' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $drug->title = $attributes['title'];
        $drug->provider_id = $attributes['provider_id'];
        $drug->measure = $attributes['measure'];
        $drug->price = $attributes['price'];
        $drug->category_id = $attributes['category_id'];
        $drug->timestamps = false;
        $drug->save();

        return redirect('/drugs');
    }

    public function destroy($drug_id)
    {
        Drug::find($drug_id)->delete();
        return redirect('/drugs');
    }

    public function show(Drug $drug)
    {
        return view('drugs.show', compact('drug'));
    }
}
