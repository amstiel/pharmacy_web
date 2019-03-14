<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }
}
