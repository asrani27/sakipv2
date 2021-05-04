<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    
    protected $table = 'kegiatan';
    protected $guarded = ['id'];
    
    public function aktivitas()
    {
        return $this->hasMany(Aktivitas::class, 'kegiatan_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function indikator4()
    {
        return $this->belongsTo(IndikatorIku4::class, 'indikator_iku4_id');
    }
}
