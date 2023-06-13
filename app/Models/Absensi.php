<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'Absensi';
    //mapping ke kolom/fieldnya
    protected $fillable = ['Siswa_id','Status'];
}
