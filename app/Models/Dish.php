<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public static function orderBy(string $string, string $string1)
    {
    }

    public function category()
    {
       return $this->belongsTo('App\Models\Category', 'category_id');
    }

}
