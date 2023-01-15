<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $table = 'usulan';

    protected $primaryKey ='id_usulan';

    protected $fillable = [
        'id_peminjaman',
        'tgl_usulan',
    ];

}
