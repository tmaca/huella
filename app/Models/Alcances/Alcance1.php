<?php

namespace App\Alcances\Alcance1;

use Illuminate\Database\Eloquent\Model;

class Alcance1 extends Model
{
    protected $table = 'alcances1';
    protected $fillable = [
        'gas_natural_kwh', 'gas_natural_nm3', 'refrigerantes', 'recarga_gases_refrigerantes'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building');
    }
}
