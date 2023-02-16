<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['tgl_produksi', 'harga_pokok_produksi', 'harga_jual', 'id_barang'];
}
