<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'doctors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'doctor_number',
        'name',
        'email',
    ];

    public function rekam_medis()
    {
        return $this->hasMany('App\RekamMedis');
    }

    public function rekam_medis_rawat_inap()
    {
        return $this->hasMany('App\RekamMedisRawatInap');
    }
}
