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
}
