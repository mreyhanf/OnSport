<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferensiOlahraga extends Model
{
    protected $table = 'preferensiolahraga';
    protected $fillable = [
        'username', 'kategori',
    ];
}
