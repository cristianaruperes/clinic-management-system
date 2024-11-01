<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResepRawatInap extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resep_rawat_inap';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'rekam_medis_id',
        'alergi',
        'keterangan_alergi',
        'hamil',
        'menyusui',
    ];

    public function rekam_medis_rawat_inap()
    {
        return $this->belongsTo('App\RekamMedisRawatInap');
    }

    public function resep_obat_rawat_inap()
    {
        return $this->hasMany('App\ResepObatRawatInap', 'resep_id');
    }
}
