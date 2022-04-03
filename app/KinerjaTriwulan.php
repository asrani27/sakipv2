<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KinerjaTriwulan extends Model
{
    protected $table = 'kinerja_triwulan';
    protected $guarded = ['id'];

    public function kinerja()
    {
        return $this->hasMany(Kinerja::class, 'kinerja_triwulan_id');
    }
}
