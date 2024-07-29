<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_group extends Model
{
    use HasFactory;
    protected $table="item_group";
    protected $primarykey = "id";
}
