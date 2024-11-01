<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRawatInap extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_rawat_inap';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'rekam_medis_id',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo('App\Services');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patients');
    }
}
