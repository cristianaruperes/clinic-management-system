<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'patient_number',
        'patient_number_sequent',
        'name',
        'id_card_number',
        'id_card',
        'patient_father_name',
        'jalan',
        'kelurahan',
        'kecamatan',
        'city',
        'postal_code',
        'residence',
        'home_phone_number',
        'handphone_phone_number',
        'office_phone_number',
        'fax_phone_number',
        'wa_phone_number',
        'golongan_darah',
        'placeOfBirth',
        'dateOfBirth',
        'sex',
        'marrital_status',
        'religion',
        'email',
        'nationality',
        'tribe',
        'language',
        'occupation',
        'clinic_info',
    ];

    public function family()
    {
        return $this->hasOne('App\GuarantorFamily', 'patient_id');
    }

    public function rekam_medis()
    {
        return $this->hasMany('App\RekamMedis');
    }

    public function rekam_medis_rawat_inap()
    {
        return $this->hasMany('App\RekamMedisRawatInap');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    public function payment_rawat_inap()
    {
        return $this->hasMany('App\PaymentRawatInap');
    }
}
