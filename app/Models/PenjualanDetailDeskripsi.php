<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetailDeskripsi extends Model
{
    use HasFactory;
    protected $table = 'penjualan_detail_deskripsi';
    protected $primaryKey = 'id_penjualan';
    public $timestamps = true;
    protected $fillable = ['id_penjualan', 'id_deskripsi','biaya'];
}
