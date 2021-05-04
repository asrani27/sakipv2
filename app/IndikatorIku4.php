<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndikatorIku4 extends Model
{
    protected $table = 'indikator_iku4';
    protected $guarded = ['id'];

    public function iku4()
    {
        return $this->belongsTo(Iku4::class, 'iku4_id');
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'indikator_iku4_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
}
