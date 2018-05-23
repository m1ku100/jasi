<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';

    protected $fillable = [
        'id', 'nama', 'alamat', 'tgl_lahir', 'kendaraan', 'nopol', 'no_telp', 'stars','dir',
    ];
}
