<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['description', 
    'barcode','
    cost', 
    'sale_price',
    'in_stock',
    'brand',
    'supplier_id',
    'product_category_id'];


    public function category(){
    	return $this->belongsTo(ProductCategory::class);
    }

}
