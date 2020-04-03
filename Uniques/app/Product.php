<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name', 'description', 'price', 'image', 'user_id', 'brand_id', 'category_id', 'color_id'];

	public function colors(){
		return $this->belongsToMany(Color::class)->withTimestamps();
	}

	public function category(){
		return $this->belongsTo(Category::class, 'product_id', 'id');
	}

	public function brand(){
		return $this->belongsTo(Brand::class, 'product_id', 'id');
	}

	public function user(){
		return $this->belongsTo(User::class, 'product_id', 'id');
	}
}
