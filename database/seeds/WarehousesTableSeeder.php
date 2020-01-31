<?php

use Illuminate\Database\Seeder;
use App\Warehouse;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::updateOrCreate([
            'name'=>'Eastcoast Warehouse',
            'address'=>'123 east coast',
            'phone_number'=>'111-1111'            
        ]);

        Warehouse::updateOrCreate([
            'name'=>'Westcoast Warehouse',
            'address'=>'123 west coast',
            'phone_number'=>'222-2222'            
        ]);
    }
}
