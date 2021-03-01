<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    
    protected $table = 'kegiatan';
    protected $guarded = ['id'];
    
    public function indikator()
    {
        return $this->hasMany(IndikatorSasaran::class, 'kegiatan_id');
    }
}
