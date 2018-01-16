<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'country_id',
        'region_id',
        'postcode',
        'address_with_number',
    ];

    public function studies()
    {
        return $this->hasMany('App\Models\Study');
    }
}
