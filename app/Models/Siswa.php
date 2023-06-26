<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    //mapping ke tabel
    protected $table = 'siswa';
    //mapping ke kolom/fieldnya
    protected $fillable = [
        'nama','nisn','nama_ortu','no_telp','user_id','kelas_id'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
