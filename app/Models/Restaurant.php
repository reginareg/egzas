<?php

namespace App\Models;
// use App\Models\Group as G;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // public function restaurant_group()
    // {
    //     return $this->hasMany(G::class, 'restaurant_id', 'id');
    // }
}