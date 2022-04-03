<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KinerjaIndikator extends Model
{
    protected $table = 'kinerja_indikator';
    protected $guarded = ['id'];

    public function kinerja()
    {
        return $this->belongsTo(Kinerja::class, 'kinerja_id');
    }
    public function triwulan()
    {
        return $this->belongsTo(KinerjaTriwulan::class, 'kinerja_triwulan_id');
    }
    public function skpd()
    {
        return $this->belongsTo(Skpd::class, 'skpd_id');
    }
}
