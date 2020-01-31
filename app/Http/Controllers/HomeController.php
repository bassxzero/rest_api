<?php

namespace App\Http\Controllers;

use App\WarehouseProduct;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function info()
    {


        try {

            DB::beginTransaction();

            $product = \App\Product::create([
                "title" => 't1',
                "description" => 'd1',
                "status" => 'active'
            ]);

            $answer = $product->prices()->create([
                "price" => '7'
            ]);

            $warehouse_product = $product->warehouse_product()->create([
                "warehouse_id" => '45',
                "available_stock" => '100'
            ]);

            var_dump($warehouse_product);

            //dd($product);

            DB::commit();

        } catch (QueryException $exception) {

            DB::rollBack();

            echo 'rolled back';
        }


        exit;

        $house = WarehouseProduct::find('1');
        echo $house->toJson(JSON_PRETTY_PRINT);


        echo "\n\n";

        $product = \App\Product::find('1');
        echo $product->toJson(JSON_PRETTY_PRINT);

        exit;


        $product = \App\Product::find('1');
        echo $product->toJson(JSON_PRETTY_PRINT);

        exit;


        echo "test";
        exit;
    }
}
