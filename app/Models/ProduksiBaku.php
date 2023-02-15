<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiBaku extends Model
{
    use HasFactory;

    protected $table = 'produksi_bahan_baku';
    protected $primaryKey = 'id_produksi';
    public $timestamps = true;
    protected $fillable = ['id_produksi', 'id_barang','jumlah'];
}
