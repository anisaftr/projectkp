<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        // $peminjaman = Peminjaman::where('id_peminjaman', $request->id_peminjaman)->first();

        $tanggapan = Tanggapan::where('id_peminjaman', $request->id_peminjaman)->first();

        if($tanggapan) {
            $peminjaman->update(['status' => $request->status]);

            $tanggapan->update([
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
            ]);

            return redirect()->route('peminjaman.show', ['peminjaman' => $peminjaman, 'tanggapan' => $tanggapan]);

        } else {
            $peminjaman->update(['status' => $request->status]);

            $tanggapan = Tanggapan::create ([
                'id_peminjaman' => $request->id_peminjaman,
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
            ]);

            return redirect()->route('peminjaman.show', ['peminjaman' => $peminjaman, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil Dikirim']);
        }
    }
}
