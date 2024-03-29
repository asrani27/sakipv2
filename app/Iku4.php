<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iku4 extends Model
{
    protected $table = 'iku4';
    protected $guarded = ['id'];
    
    public function indikator4()
    {
        return $this->hasMany(IndikatorIku4::class, 'iku4_id', 'id');
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

    public function program()
    {
        return $this->belongsto(Program::class, 'program_id', 'id');
    }
}
