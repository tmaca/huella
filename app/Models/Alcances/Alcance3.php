<?php

namespace App\Alcances\Alcance3;

use Illuminate\Database\Eloquent\Model;

class Alcance3 extends Model
{
    protected $table = 'alcances1';
    protected $fillable = [
        'agua_potable_m3', 'papel_carton_consumo_kg', 'papel_carton_residuos_kg', 'factor_kwh_nm3'
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building');
    }
}
