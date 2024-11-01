<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuarantorFamily extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guarantor_and_family';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'patient_id',
        'name',
        'relation_with_patient',
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
        'assurance',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patients', 'id');
    }
}
