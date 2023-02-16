<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deskripsi extends Model
{
    use HasFactory;
    protected $table = 'deskripsi';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['deskripsi'];
}
