<?php

namespace App\Alcances\Alcance2;

use Illuminate\Database\Eloquent\Model;

class Alcance2 extends Model
{
    protected $table = 'alcances2';
    protected $fillable = ['electricidad_kwh'];

    public function building()
    {
        return $this->belongsTo('App\Models\Building');
    }
}
