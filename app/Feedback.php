<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'id', 'nama', 'email', 'subject', 'konten', 'isread',
    ];
}
