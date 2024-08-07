<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'partyorder';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'buyer_name', 'phone_number', 'address', 'item_name', 'price', 'qty'
    ];
    public $timestamps = false;
//     protected $table="order";
//     protected $primarykey = "id";
}
