<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{

    protected $table = 'dish_types';


    protected $fillable = ['type_name', 'id'];
}
