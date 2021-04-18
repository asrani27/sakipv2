<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IkuKota extends Model
{
    protected $table = 'iku_kota';
    protected $guarded = ['id'];
    
    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
    
    public function indikator()
    {
        return $this->hasMany(IndikatorIkuKota::class, 'iku_kota_id', 'id');
    }
}
