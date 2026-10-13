<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    protected $table = 'skemas';
    protected $fillable = ['kode_skema', 'nama_skema', 'jenis'];

    public function pesertas()
    {
        return $this->hasMany(Peserta::class, 'skema_id');
    }
}
