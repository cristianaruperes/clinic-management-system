<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResepObatRawatInap extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resep_obat_rawat_inap';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'resep_id',
        'medicine_id',
        'dosis',
        'jumlah',
        'harga',
    ];

    public function resep_rawat_inap()
    {
        return $this->belongsTo('App\ResepRawatInap');
    }

    public function medicine()
    {
        return $this->belongsTo('App\Medicines');
    }
}
