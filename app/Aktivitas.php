<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $table ="aktivitas";

    protected $guarded = ['id'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class,'kegiatan_id','id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class,'tahun_id','id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class,'jabatan_id','id');
    }
}
