<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

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
        return $this->hasMany(Tupoksi::class, 'jabatan_id')->where('jenis', 1);
    }

    public function fungsi()
    {
        return $this->hasMany(Tupoksi::class, 'jabatan_id')->where('jenis', 2);
    }

    public function atasan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function bawahan()
    {
        return $this->hasMany(Jabatan::class, 'jabatan_id');
    }
    
    public function verifiku()
    {
        return $this->hasMany(Iku::class, 'jabatan_id');
    }

    public function ikuEselon2()
    {
        return $this->hasMany(Iku2::class, 'jabatan_id');
    }
    
    public function ikuEselon3()
    {
        return $this->hasMany(Iku3::class, 'jabatan_id');
    }
    
    public function ikuEselon4()
    {
        return $this->hasMany(Iku4::class, 'jabatan_id');
    }
}
