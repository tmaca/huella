<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';
    protected $fillable = [
        'name',
        'year'
    ];

    public function alcance1()
    {
        return $this->hasOne('App\Models\Alcance1');
    }

    public function alcance3()
    {
        return $this->hasOne('App\Models\Alcance2');
    }

    public function alcance3()
    {
        return $this->hasOne('App\Models\Alcance3');
    }
}
