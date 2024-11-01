<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resep_obat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'resep_id',
        'medicine_id',
        'dosis',
        'jumlah',
        'harga',
    ];

    public function resep()
    {
        return $this->belongsTo('App\Resep');
    }

    public function medicine()
    {
        return $this->belongsTo('App\Medicines');
    }
}
