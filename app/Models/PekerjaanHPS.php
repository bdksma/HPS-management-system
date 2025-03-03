<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanHPS extends Model
{
    use HasFactory;

    // Nama tabel yang terhubung
    protected $table = 'pekerjaan_hps';
    protected $primaryKey = 'pekerjaan_id';
    
    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'pekerjaan_id',
        'nama_pekerjaan',
        'nomor_pekerjaan',
        'lokasi',
    ];

    /**
     * Relasi ke model RincianPekerjaanHPS (One-to-Many)
     */
    public function rincianPekerjaanHPS()
    {
        return $this->hasMany(RincianPekerjaanHPS::class, 'pekerjaan_id', 'pekerjaan_id');
    }
}
