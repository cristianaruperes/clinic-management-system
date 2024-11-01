<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'access_level' => 'superadmin',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'kasir',
            'username' => 'kasir',
            'email' => 'kasir@gmail.com',
            'access_level' => 'kasir',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'apoteker',
            'username' => 'apoteker',
            'email' => 'apoteker@gmail.com',
            'access_level' => 'apoteker',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'staf',
            'username' => 'staf',
            'email' => 'staf@gmail.com',
            'access_level' => 'staf',
            'password' => Hash::make('password'),
        ]);
    }
}
