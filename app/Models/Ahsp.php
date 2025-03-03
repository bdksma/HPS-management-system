<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahsp extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul_pekerjaan',
        'volume_quantity',
        'satuan',
        'proses',
        'asumsi',
        'keterangan_uoa',
        'satuan_uoa',
        'volume_upah_uoa',
        'upah_oa',
        'keterangan_utak',
        'satuan_utak',
        'volume_upah_tak',
        'harga_index_banten',
        'keterangan_utb',
        'proporsional_persen_upah',
        'volume_upah_tb',
        'upah_tahun_2023',
        'keterangan_ubp',
        'satuan_ubp',
        'volume_upah_bp',
        'upah_bp',
        'jenis_bahan',
        'satuan_bahan',
        'volume_bahan',
        'harga_satuan_bahan',
        'jenis_alat',
        'satuan_alat',
        'volume_alat',
        'harga_satuan_alat',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ahspdata';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
