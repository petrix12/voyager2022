<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function scopeCurrentUser($query){
        $query->where('user_id', auth()->user()->id);
    }
}
