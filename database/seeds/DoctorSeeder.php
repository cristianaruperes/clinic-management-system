<?php

use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'doctor_number' => 'DR'.mt_rand(1000000000, 9999999999),
            'name' => 'Dr Marturia Inriani Aruperes M.Kes',
            'email' => 'marturiaaruperes@gmail.com',
        ]);
    }
}
