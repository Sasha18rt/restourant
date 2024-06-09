<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    // The table associated with the model.
    protected $table = 'dish_types';

    // The attributes that are mass assignable.
    protected $fillable = ['type_name'];
}
