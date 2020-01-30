<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for( $x = 1; $x < 11; $x++) {
            
            $product = \App\Product::create([
                "title" => 'Product ' . $x,
                "description" => 'Description ' . $x,
                "status" => 'active'
            ]);
    
            $answer = $product->prices()->create([
                "price" => $x * 5
            ]);
    
            $warehouse_product = $product->warehouse_product()->create([
                "warehouse_id" => ($x % 2 ? 1 : 2),
                "available_stock" => rand(5, 75)
            ]);
        }
    }
}
