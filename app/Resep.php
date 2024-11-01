<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resep';

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

    public function rekam_medis()
    {
        return $this->belongsTo('App\RekamMedis');
    }

    public function resep_obat()
    {
        return $this->hasMany('App\ResepObat');
    }
}
