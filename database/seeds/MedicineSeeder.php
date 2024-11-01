<?php

use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            'kode_item' => 'OB'.mt_rand(1000000000, 9999999999),
            'jenis_produk' => 'retail',
            'nama' => 'Paracetamol',
            'harga_jual' => '20000',
            'harga_beli' => '10000',
            'satuan' => 'tablet',
            'stok_minimal' => '20',
            'stok_sisa' => null,
            'stok_terpakai' => null,
            'tanggal_expired' => '2020-09-16',
        ]);
    }
}
