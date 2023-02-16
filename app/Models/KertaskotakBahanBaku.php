<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KertaskotakBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku_kertaskotak_detail';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id_bahan_baku','jml_adl', 'jml_sd','jml_sl'];
}
