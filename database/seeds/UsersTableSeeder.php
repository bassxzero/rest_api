<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'email' => 'first@admin.com',
            'name' => 'some name',            
            'password' => bcrypt('1234')
        ]);
    }
}
