<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPersediaan extends Model
{
    use HasFactory;
    protected $table = 'jenis_persediaan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['nama_persediaan'];
}
