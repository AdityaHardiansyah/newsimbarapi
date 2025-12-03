<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai'; // nama tabel sesuai DB


    public $timestamps = false;


    protected $fillable = [
        'NIP',
        'Nama',
        'Umur',
    ];
}