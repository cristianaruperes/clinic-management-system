<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rawat_jalan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'rekam_medis_number',
        'patient_id',
        'doctor_id',
        'nomor_urut',
        'status',
        'tanggal_pelayanan',
        'tanggal_pembayaran',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patients');
    }

    public function resep()
    {
        return $this->hasOne('App\Resep');
    }
}
