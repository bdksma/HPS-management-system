<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianPekerjaan extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'rincian_pekerjaans';
    protected $fillable = [
        'scope_pekerjaan',
        'total_harga_bahan',
        'total_harga_alat',
        'total_harga_upah',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    

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
}