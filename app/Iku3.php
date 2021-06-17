<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iku3 extends Model
{
    protected $table = 'iku3';
    protected $guarded = ['id'];
    
    public function indikator3()
    {
        return $this->hasMany(IndikatorIku3::class, 'iku3_id', 'id');
    }
    
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
    
    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

}
