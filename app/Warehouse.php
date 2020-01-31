<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouses';
    protected $fillable = ['name', 'address', 'phone_number'];


    public function warehouse_product()
    {
        return $this->hasMany('App\WarehouseProduct');
    }
}
