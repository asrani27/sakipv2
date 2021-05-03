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

    public function tahun()
    {
        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function indikator_iku()
    {
        return $this->belongsTo(IndikatorIku::class, 'indikator_iku_id');
    }
}
