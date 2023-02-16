<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartonBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku_karton_detail';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id_bahan_baku','jml_at', 'jml_skl','jml_skd'];
}
