<?php

use Illuminate\Database\Seeder;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Warehouse::updateOrCreate([
            'name'=>'Eastcoast Warehouse',
            'address'=>'123 east coast',
            'phone_number'=>'111-1111'            
        ]);
        
        \App\Warehouse::updateOrCreate([
            'name'=>'Westcoast Warehouse',
            'address'=>'123 west coast',
            'phone_number'=>'222-2222'            
        ]);
    }
}
