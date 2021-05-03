<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iku extends Model
{
    protected $table = 'iku';
    protected $guarded = ['id'];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
    
    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function indikator()
    {
        return $this->hasMany(IndikatorIku::class, 'iku_id', 'id');
    }

    public function pk()
    {
        return $this->hasMany(Pk::class, 'iku_id','id');
    }
}
