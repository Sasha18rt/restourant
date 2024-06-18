<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'image', 'description', 'type_id'];
    protected $table = 'dishes';

    public function addOns()
    {
        return $this->belongsToMany(AddOn::class, 'dish_add_ons', 'id', 'addon_id');
    }
}
