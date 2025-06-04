<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Studen extends Model
{
    use HasFactory;

    protected $table = 'studen';
    protected $fillable = [
        'name',
        'gender',   
        'tgl_lahir',
        'nisn',
    ];
}
