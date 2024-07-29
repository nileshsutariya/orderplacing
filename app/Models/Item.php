<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table="item";
    protected $primarykey = "id";
    protected $fillable = ['group_id', 'name', 'price', 'qty'];

    public function itemgroup()
    {
        return $this->belongsTo(Item_group::class);
    }

}
