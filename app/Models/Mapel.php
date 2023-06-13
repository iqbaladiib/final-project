<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'Mapel';
    //mapping ke kolom/fieldnya
    protected $fillable = ['Kode_mapel','Nama_mapel'];
}
