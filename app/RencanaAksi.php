<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencanaAksi extends Model
{
    protected $table = 'rencana_aksi';
    protected $guarded = ['id'];

    public function pk()
    {
        return $this->belongsTo(Pk::class, 'pk_id');
    }
}
