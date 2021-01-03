<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';

    protected $guarded = ['id'];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class);
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tupoksi::class, 'unit_kerja_id')->where('jenis', 1);
    }

    public function fungsi()
    {
        return $this->hasMany(Tupoksi::class, 'unit_kerja_id')->where('jenis', 2);
    }

    public function atasan()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    public function bawahan()
    {
        return $this->hasMany(UnitKerja::class, 'unit_kerja_id');
    }
}
