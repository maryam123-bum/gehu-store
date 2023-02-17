<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiOverhead extends Model
{
    use HasFactory;

    protected $table = 'produksi_overhead';
    protected $primaryKey = 'id_produksi';
    public $timestamps = true;
    protected $fillable = ['id_produksi','id_deskripsi', 'biaya'];
}
