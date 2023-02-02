<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    use HasFactory;

    protected $table = 'persediaan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['nama_barang', 'id_jenis', 'stok', 'harga_pokok', 'id_satuan'];
}
