<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOn extends Model
{
    use HasFactory;

    protected $fillable = ['addon_name', 'price'];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dish_add_ons');
    }
}
