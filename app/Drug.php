<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
        'title',
        'provider_id',
        'category_id',
        'measure',
        'price',
        'balance',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function getFormattedPrice()
    {
        return number_format($this->price, 2, '.', ' ').' ₽';
    }
//    public function getFormattedPrice()
//    {
//        return \money_format('%.2n', $this->price);
//    }
}
