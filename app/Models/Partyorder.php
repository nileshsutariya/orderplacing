<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partyorder extends Model
{
    use HasFactory;
    protected $table="partyorder";
    protected $primarykey = "id";
}
