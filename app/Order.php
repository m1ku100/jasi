<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'id', 'pengambilan', 'tujuan', 'jarak', 'harga', 'user_id', 'catatan', 'is_nyampek',
    ];
}
