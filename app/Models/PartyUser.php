<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyUser extends Model
{
    use HasFactory;

    public function user (){
        return $this -> hasMany(User::class);

        
    }

    public function party (){
        return $this -> hasMany(Party::class);
    }
}
