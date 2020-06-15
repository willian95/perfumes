<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    
    public function productTypeSize(){
        return $this->belongsTo(ProductTypeSize::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

}
