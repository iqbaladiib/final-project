<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'Siswa';
    //mapping ke kolom/fieldnya
    protected $fillable = ['Nama','NIM', 'Email', 'Jenis Kelamin', 'Nama Orang Tua', 'No Telepon', 'Kelas_id','Kelas_idKelas','Mapel_idMapel','User_idUser'];
}
