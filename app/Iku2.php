<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iku2 extends Model
{
    protected $table = 'iku2';
    protected $guarded = ['id'];
    
    public function indikator2()
    {
        return $this->hasMany(IndikatorIku2::class, 'iku2_id', 'id');
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
