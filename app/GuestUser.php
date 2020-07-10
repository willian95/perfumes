<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model
{
    protected $table="guest_users";

    public function shoppings(){
        return $this->hasMany(App\GuestUser::class);
    }

}
