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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => '1',
            'password' => Hash::make('1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'role_id' => '2',
            'password' => Hash::make('1234'),
        ]);
    }
}
