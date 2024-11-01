<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medicines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'kode_item',
        'jenis_produk',
        'nama',
        'harga_jual',
        'harga_beli',
        'satuan',
        'stok_minimal',
        'stok_sisa',
        'stok_terpakai',
        'tanggal_expired',
    ];

    public function medicine_stock()
    {
        return $this->hasMany('App\MedicineStock');
    }

    public function resep_obat()
    {
        return $this->hasMany('App\ResepObat');
    }
}
