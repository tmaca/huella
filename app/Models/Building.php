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

    public function studies()
    {
        return $this->hasMany('App\Models\Study');
    }
}
