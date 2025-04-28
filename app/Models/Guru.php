<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_guru',
        'kode_guru',
        'mapel_id',
    ];

     // Relasi ke Mapel
     public function mapel()
     {
         return $this->belongsTo(Mapel::class, 'mapel_id');
     }
}
