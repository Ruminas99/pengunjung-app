<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pihak;
use App\Models\Dinas;
use App\Models\Ptsp;
use App\Models\Mahasiswa;
use Carbon\Carbon;
class FormController extends Controller
{
    public function storePihak(Request $request)
    {
        $request->validate([
            'nomor_perkara' => 'required|string|max:255',
            'nama_pihak' => 'required|string|max:255',
            'pihak_hadir' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['created_at'] = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $data['updated_at'] = $data['created_at'];

        Pihak::create($data);
        return back()->with('success', 'Data pihak berhasil disimpan.');
    }

    public function storeDinas(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nama_kantor' => 'required|string|max:255',
            'ke_bagian' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['created_at'] = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $data['updated_at'] = $data['created_at'];

        Dinas::create($data);
        return back()->with('success', 'Data dinas berhasil disimpan.');
    }

    public function storePtsp(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'ke_meja' => 'required|string|max:10',
        ]);

        $data = $request->all();
        $data['created_at'] = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $data['updated_at'] = $data['created_at'];

        Ptsp::create($data);
        return back()->with('success', 'Data PTSP berhasil disimpan.');
    }

    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'universitas' => 'required|string|max:255',
            'jumlah_klinis' => 'required|integer|min:1',
        ]);

        $data = $request->all();
        $data['created_at'] = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $data['updated_at'] = $data['created_at'];

        Mahasiswa::create($data);
        return back()->with('success', 'Data mahasiswa berhasil disimpan.');
    }
}
