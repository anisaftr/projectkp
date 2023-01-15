<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'kode_barang',
        'nip',
        'bidang',
        'nama_barang',
        'tgl_peminjaman',
        'jumlah',
        'status',
    ];

    protected $dates = ['tgl_peminjaman'];

    public function user()
    {
        return $this->hasOne(Pengguna::class, 'nip', 'nip');
    }
}
