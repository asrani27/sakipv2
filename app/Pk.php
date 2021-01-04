<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pk extends Model
{
    protected $table = 'pk';

    protected $guarded = ['id'];

    public function indikator()
    {
        return $this->hasMany(Pk_indikator::class, 'pk_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function rencana_aksi()
    {
        return $this->hasOne(RencanaAksi::class, 'pk_id');
    }
}
