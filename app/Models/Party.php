<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Party extends Authenticatable
{
    use HasFactory;
    
    protected $guard = 'party';
    protected $table="party_master";
    protected $primarykey = "id";
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
