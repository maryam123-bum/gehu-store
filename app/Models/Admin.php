<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['username', 'password','id_karyawan'];
}
