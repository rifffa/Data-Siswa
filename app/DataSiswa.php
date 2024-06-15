<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $table = "datasiswa";

    protected $fillable = [
        'nama',
        'nim',
        'prodi',
        'foto'
    ];
    
}
