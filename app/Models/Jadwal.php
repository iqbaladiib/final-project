<?php

namespace App\Models;

use App\Models\Kelas as ModelsKelas;
use App\Models\Mapel as ModelsMapel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    //mapping ke tabel
    protected $table = 'jadwal';
    //mapping ke kolom/fieldnya
    protected $fillable = [
        'hari','jam_pelajaran','kelas_id','guru_id','mapel_id'
    ];
    
    public $timestamps = false;
    
    public function kelas()
    {
        return $this->belongsTo(ModelsKelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(ModelsMapel::class);
    }

    public function jadwal()
    {
        return $this->hasMany(jadwal::class);
    }
}
