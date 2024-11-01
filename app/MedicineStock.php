<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineStock extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medicine_stock';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'medicine_id',
        'jumlah',
    ];

    public function medicine()
    {
        return $this->belongsTo('App\Medicines');
    }
}
