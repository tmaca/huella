<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterConfirmation;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ContactoUsuario extends Model
{
    protected $table = 'contactoUsuarios';
    public $timestamps = false;
    protected $fillable = [
        'email', 'subject', 'message'
    ];


}
