<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    protected $table = 'kinerja';
    protected $guarded = ['id'];

    public function triwulan()
    {
        return $this->belongsTo(KinerjaTriwulan::class, 'kinerja_triwulan_id');
    }

    public function indikator()
    {
        return $this->hasMany(KinerjaIndikator::class, 'kinerja_id');
    }
}
