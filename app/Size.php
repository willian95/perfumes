<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function productTypeSize(){
        return $this->hasMany(ProductTypeSize::class);
    }
}
