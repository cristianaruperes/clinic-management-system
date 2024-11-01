<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'price',
    ];

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    public function payment_rawat_inap()
    {
        return $this->hasMany('App\PaymentRawatInap');
    }
}
