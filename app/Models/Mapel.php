<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    //mapping ke tabel
    protected $table = 'mapel';
    //mapping ke kolom/fieldnya
    protected $fillable = [
        'kode_mapel', 'nama_mapel'
    ];
    public $timestamps = false;
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
