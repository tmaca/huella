<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function alcance1()
    {
        return $this->hasMany('App\Models\Alcance1');
    }

    public function alcance2()
    {
        return $this->hasMany('App\Models\Alcance2');
    }

    public function alcance3()
    {
        return $this->hasMany('App\Models\Alcance3');
    }

    public function resultadoAlcance()
    {
        return $this->hasMany('App\Models\ResultadoAlcance');
    }
}
