<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseProduct extends Model
{
    protected $table = 'warehouses_products';
    protected $fillable = ['available_stock', 'warehouse_id'];


    public function warehouse()
    {
        return $this->hasOne('App\Warehouse');
    }

    public function product()
    {
        return $this->hasOne('App\Poduct');
    }

}
