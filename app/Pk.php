<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pk extends Model
{
    protected $table = 'pk';

    protected $guarded = ['id'];

    public function indikator_iku()
    {
        return $this->belongsTo(IndikatorIku::class, 'indikator_iku_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function program()
    {
        return $this->hasMany(Program::class, 'pk_id', 'id');
    }
    
    public function rencana_aksi()
    {
        return $this->hasOne(RencanaAksi::class, 'pk_id');
    }
}
