<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['title', 'description', 'unit_price'];

    protected $appends = ['unit_price', 'available_stock'];
    protected $with = ['prices', 'warehouse_product'];

    protected $hidden = ['prices', 'warehouse_product'];


    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    public function warehouse_product()
    {
        return $this->hasMany('App\WarehouseProduct');
    }

    public function getAvailableStockAttribute()
    {
        $WarehouseProducts = $this->warehouse_product()->get();
        $stock = 0;

        foreach ($WarehouseProducts as $WarehouseProduct) {
            $stock = $stock + $WarehouseProduct['available_stock'];
        }

        return $stock;
    }

    public function getUnitPriceAttribute()
    {
        $price = $this->prices()->orderBy('created_at', 'desc')->take(1)->get();
        return $price[0]->price;
    }
}
