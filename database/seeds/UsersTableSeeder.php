<?php

use App\User;
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
        User::create([
        	'name' => 'Iván',
        	'email' => 'webmasterbrak@gmail.com',
        	'password' => bcrypt('12345678')
        ]);

        factory(User::class, 10)->create();
    }
}
