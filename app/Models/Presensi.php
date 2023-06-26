<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    //mapping ke tabel
    protected $table = 'presensi';
    //mapping ke kolom/fieldnya
    protected $fillable = [
        'siswa_id', 'status', 'jadwal_id'
    ];
    public $timestamps = false;
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
