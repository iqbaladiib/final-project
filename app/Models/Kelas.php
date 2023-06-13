<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'Kelas';
    //mapping ke kolom/fieldnya
    protected $fillable = ['Kode_kelas','Nama_kelas'];
}
