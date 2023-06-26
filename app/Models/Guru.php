<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    //mapping ke tabel
    protected $table = 'guru';
    //mapping ke kolom/fieldnya
    protected $fillable = [
        'nama', 'nip', 'no_telp', 'user_id'
    ];
    
    public $timestamps = false;
    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
}
