<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pihak;
use App\Models\Dinas;
use App\Models\Ptsp;
use App\Models\Mahasiswa;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $currentMonth = Carbon::now()->month;
        // Jumlah total hari ini
        $jumlahHariIni = Dinas::whereDate('created_at', $today)->count()
                        + Ptsp::whereDate('created_at', $today)->count()
                        + Mahasiswa::whereDate('created_at', $today)->count()
                        + Pihak::whereDate('created_at', $today)->count();

        // Jumlah per jenis
        $jumlahDinas = Dinas::whereDate('created_at', $today)->count();
        $jumlahPtsp = Ptsp::whereDate('created_at', $today)->count();
        $jumlahMahasiswa = Mahasiswa::whereDate('created_at', $today)->count();
        $jumlahPihak = Pihak::whereDate('created_at', $today)->count();

        // Daftar terbaru
        $daftarTerbaru = collect()
        ->merge(Dinas::orderBy('created_at', 'desc')->take(5)->get()->map(function ($item) {
            return [
                'nama' => $item->nama,
                'waktu' => $item->created_at,
                'keterangan' => 'Tamu Dinas - ' . $item->ke_bagian,
            ];
        }))
        ->merge(Ptsp::orderBy('created_at', 'desc')->take(5)->get()->map(function ($item) {
            return [
                'nama' => $item->nama,
                'waktu' => $item->created_at,
                'keterangan' => 'Tamu PTSP - Meja ' . $item->ke_meja,
            ];
        }))
        ->merge(Mahasiswa::orderBy('created_at', 'desc')->take(5)->get()->map(function ($item) {
            return [
                'nama' => $item->nama,
                'waktu' => $item->created_at,
                'keterangan' => 'Mahasiswa - ' . $item->universitas,
            ];
        }))
        ->merge(Pihak::orderBy('created_at', 'desc')->take(5)->get()->map(function ($item) {
            return [
                'nama' => $item->nama_pihak,
                'waktu' => $item->created_at,
                'keterangan' => 'Pihak - No. Perkara: ' . $item->nomor_perkara,
            ];
        }))
        ->sortByDesc('waktu')
        ->take(10);

        $dataBulananLengkap = collect();

    $dataBulananLengkap = $dataBulananLengkap->merge(Dinas::whereMonth('created_at', $currentMonth)->get()->map(function ($item) {
        return [
            'jenis' => 'Dinas',
            'nama' => $item->nama,
            'keterangan' => 'Tamu Dinas - ' . $item->ke_bagian,
            'waktu' => $item->created_at,
        ];
    }));

    $dataBulananLengkap = $dataBulananLengkap->merge(Ptsp::whereMonth('created_at', $currentMonth)->get()->map(function ($item) {
        return [
            'jenis' => 'PTSP',
            'nama' => $item->nama,
            'keterangan' => 'Tamu PTSP - Meja ' . $item->ke_meja,
            'waktu' => $item->created_at,
        ];
    }));

    $dataBulananLengkap = $dataBulananLengkap->merge(Mahasiswa::whereMonth('created_at', $currentMonth)->get()->map(function ($item) {
        return [
            'jenis' => 'Mahasiswa',
            'nama' => $item->nama,
            'keterangan' => 'Mahasiswa - ' . $item->universitas,
            'waktu' => $item->created_at,
        ];
    }));

    $dataBulananLengkap = $dataBulananLengkap->merge(Pihak::whereMonth('created_at', $currentMonth)->get()->map(function ($item) {
        return [
            'jenis' => 'Pihak',
            'nama' => $item->nama_pihak,
            'keterangan' => 'No. Perkara: ' . $item->nomor_perkara,
            'waktu' => $item->created_at,
        ];
    }));

    $dataBulananLengkap = $dataBulananLengkap->sortByDesc('waktu');

    return view('laporan', compact(
        'jumlahHariIni',
        'jumlahDinas',
        'jumlahPtsp',
        'jumlahMahasiswa',
        'jumlahPihak',
        'daftarTerbaru',
        'dataBulananLengkap'
    ));
    }
}
