<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetailDeskripsi extends Model
{
    use HasFactory;
    protected $table = 'pembelian_detail_deskripsi';
    protected $primaryKey = 'id_pembelian';
    public $timestamps = true;
    protected $fillable = ['id_pembelian', 'deskripsi','biaya'];
}
