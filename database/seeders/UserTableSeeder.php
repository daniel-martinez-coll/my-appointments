<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Daniel Martinez Coll',
    		'email' => 'daniel.martinez.coll@hotmail.com',
    		'password' => bcrypt('largui65'),
    		'dni' => '324324324',
    		'address' => '',
    		'phone' => '',
    		'role' =>'admin'
    	]);

        User::factory(50)->create();
    }
}
