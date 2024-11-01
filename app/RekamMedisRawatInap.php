<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedisRawatInap extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rawat_inap';

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
        'room_id',
        'nomor_urut',
        'status',
        'tanggal_pelayanan',
        'tanggal_pembayaran',
        'tanggal_keluar',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patients');
    }

    public function resep_rawat_inap()
    {
        return $this->hasOne('App\ResepRawatInap', 'rekam_medis_id');
    }    
}
