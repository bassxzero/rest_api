<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::firstOrCreate([
            'email' => 'first@admin.com',
            'name' => 'some name',            
            'password' => bcrypt('1234')
        ]);
    }
}
