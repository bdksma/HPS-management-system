<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upah extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $fillable = [
        'jenis_upah',
        'keterangan',
        'satuan_persentase_utb',
        'upah'
    ];

    protected $table = 'upah';

    protected $primaryKey = 'id';
    public $incrementing = true;

}
