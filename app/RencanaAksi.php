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

    public function sub()
    {
        return $this->hasMany(RencanaAksi::class, 'rencana_aksi_id');
    }
    
    public function top()
    {
        return $this->belongsTo(RencanaAksi::class, 'rencana_aksi_id');
    }
}
