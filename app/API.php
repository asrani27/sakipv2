<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class API extends Model
{
    protected $table = 'api';
    protected $guarded = ['id'];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class, 'kode_skpd', 'kode_skpd');
    }
}
