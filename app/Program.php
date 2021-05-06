<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $guarded = ['id'];
    
    public function indikator()
    {
        return $this->hasMany(IndikatorProgram::class, 'program_id');
    }

    public function iku4()
    {
        return $this->hasMany(Iku4::class, 'program_id');
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'program_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function indikator_iku3()
    {
        return $this->belongsTo(IndikatorIku3::class, 'indikator_iku3_id');
    }
}
