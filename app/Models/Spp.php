<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'spp'; // nama tabel sesuai DB
     protected $primaryKey = 'id';   // Nama kolom primary key


    public $timestamps = false;


    protected $fillable = [
        'nilai',
        'jumlah',
        'ppk',
    ];
}