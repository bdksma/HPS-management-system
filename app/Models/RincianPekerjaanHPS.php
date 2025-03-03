<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianPekerjaanHPS extends Model
{
    use HasFactory;

    // Nama tabel yang terhubung
    protected $table = 'rincian_pekerjaan_hps';
    protected $primaryKey = 'rincian_pekerjaan_id';
    public $incrementing = false; // Jika rincian_pekerjaan_id manual
    protected $keyType = 'string'; // Gunakan 'string' jika rincian_pekerjaan_id bukan angka

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'rincian_pekerjaan_id',
        'pekerjaan_id',
        'nomor_urut',
        'uraian_pekerjaan',
        'volume_angka',
        'volume_satuan',
        'biaya_satuan_bahan',
        'biaya_satuan_upah',
        'biaya_satuan_alat',
    ];

    // Atribut tambahan (accessor)
    protected $appends = [
        'biaya_pekerjaan',
        'biaya_langsung_bahan',
        'biaya_langsung_upah',
        'biaya_langsung_alat',
        'jumlah_total',
    ];

    /**
     * Getter untuk biaya pekerjaan
     */
    public function getBiayaPekerjaanAttribute()
    {
        return $this->biaya_satuan_bahan + $this->biaya_satuan_upah + $this->biaya_satuan_alat;
    }

    /**
     * Getter untuk biaya langsung bahan
     */
    public function getBiayaLangsungBahanAttribute()
    {
        return $this->volume_angka * $this->biaya_satuan_bahan;
    }

    /**
     * Getter untuk biaya langsung upah
     */
    public function getBiayaLangsungUpahAttribute()
    {
        return $this->volume_angka * $this->biaya_satuan_upah;
    }

    /**
     * Getter untuk biaya langsung alat
     */
    public function getBiayaLangsungAlatAttribute()
    {
        return $this->volume_angka * $this->biaya_satuan_alat;
    }

    /**
     * Getter untuk jumlah total
     */
    public function getJumlahTotalAttribute()
    {
        return $this->biaya_langsung_bahan + $this->biaya_langsung_upah + $this->biaya_langsung_alat;
    }

    /**
     * Relasi ke model PekerjaanHPS (Many-to-One)
     */
    public function pekerjaan()
    {
        return $this->belongsTo(PekerjaanHPS::class, 'pekerjaan_id', 'pekerjaan_id');
    }
}
