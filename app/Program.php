<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $guarded = ['id'];
    
    public function indikator()
    {
        return $this->hasMany(IndikatorSasaran::class, 'program_id');
    }
}
