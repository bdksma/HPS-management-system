<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pekerjaan extends Model
{
    public $timestamps = false;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_pekerjaan',
        'lokasi',
        'nomor_pekerjaan',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pekerjaans';

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

    public function rincianPekerjaans(){
        return $this->hasMany(RincianPekerjaan::class, 'pekerjaan_id');
    }
}
