<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $guarded = [];

   /**
    * Get the category that owns the Dish
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function category()
   {
       return $this->belongsTo(Category::class,'category_id', 'id');
   }

   /**
    * Get all of the orders for the Dish
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function orders()
   {
       return $this->hasMany(Order::class,'dish_id','id');
   }
}
