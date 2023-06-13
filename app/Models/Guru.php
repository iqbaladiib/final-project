<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'Guru';
    //mapping ke kolom/fieldnya
    protected $fillable = ['Nama','NIP','Email','Jenis Kelamin','No Telepon'];
}
