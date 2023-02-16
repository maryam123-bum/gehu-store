<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KertasluarBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku_kertasluar_detail';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id_bahan_baku','jml_dk', 'jml_lk','jml_sd','jml_sl'];
}
