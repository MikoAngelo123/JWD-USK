<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'pesertas';
    protected $fillable = ['nik', 'nama_lengkap', 'email', 'telepon', 'skema_id'];

    public function skema()
    {
        return $this->belongsTo(Skema::class, 'skema_id');
    }
}
