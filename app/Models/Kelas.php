<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    //mapping ke tabel
    protected $table = 'kelas';
    //mapping ke kolom/fieldnya
    protected $fillable = [
        'kode_kelas', 'nama_kelas'
    ];
    public $timestamps = false;
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
