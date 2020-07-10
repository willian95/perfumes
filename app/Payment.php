<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    public function productPurchases(){
        return $this->hasMany(ProductPurchase::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function guest(){
        return $this->belongsTo(App\GuestUser::class);
    }

}
