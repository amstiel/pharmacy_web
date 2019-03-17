<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'drug_id',
        'created_at',
        'amount'
    ];

    public function drug() {
        return $this->belongsTo(Drug::class);
    }
}
