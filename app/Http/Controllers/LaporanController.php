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
       $daftarHariIniLengkap = collect();

$daftarHariIniLengkap = $daftarHariIniLengkap->merge(Dinas::whereDate('created_at', $today)->get()->map(function ($item) {
    return [
        'jenis' => 'Dinas',
        'nama' => $item->nama,
        'keterangan' => 'Tamu Dinas - ' . $item->ke_bagian,
        'waktu' => $item->created_at,
    ];
}));

$daftarHariIniLengkap = $daftarHariIniLengkap->merge(Ptsp::whereDate('created_at', $today)->get()->map(function ($item) {
    return [
        'jenis' => 'PTSP',
        'nama' => $item->nama,
        'keterangan' => 'Tamu PTSP - Meja ' . $item->ke_meja,
        'waktu' => $item->created_at,
    ];
}));

$daftarHariIniLengkap = $daftarHariIniLengkap->merge(Mahasiswa::whereDate('created_at', $today)->get()->map(function ($item) {
    return [
        'jenis' => 'Mahasiswa',
        'nama' => $item->nama,
        'keterangan' => 'Mahasiswa - ' . $item->universitas,
        'waktu' => $item->created_at,
    ];
}));

$daftarHariIniLengkap = $daftarHariIniLengkap->merge(Pihak::whereDate('created_at', $today)->get()->map(function ($item) {
    return [
        'jenis' => 'Pihak',
        'nama' => $item->nama_pihak,
        'keterangan' => 'No. Perkara: ' . $item->nomor_perkara,
        'waktu' => $item->created_at,
    ];
}));

$daftarHariIniLengkap = $daftarHariIniLengkap->sortByDesc('waktu');

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
        'dataBulananLengkap',
        'daftarHariIniLengkap'
    ));
    }

 public function laporanBulanan()
    {
        // Mengambil bulan dan tahun saat ini untuk query yang akurat
        $now = Carbon::now();
        $currentMonth = $now->month;
        $currentYear = $now->year;

        // --- Mengambil Data & Menghitung Jumlah per Jenis Tamu ---

        // 1. Tamu Dinas
        $dataDinas = Dinas::whereYear('created_at', $currentYear)
                          ->whereMonth('created_at', $currentMonth)
                          ->get();
        $jumlahDinas = $dataDinas->count();

        // 2. Tamu PTSP
        $dataPtsp = Ptsp::whereYear('created_at', $currentYear)
                        ->whereMonth('created_at', $currentMonth)
                        ->get();
        $jumlahPtsp = $dataPtsp->count();

        // 3. Tamu Mahasiswa
        $dataMahasiswa = Mahasiswa::whereYear('created_at', $currentYear)
                                  ->whereMonth('created_at', $currentMonth)
                                  ->get();
        $jumlahMahasiswa = $dataMahasiswa->count();

        // 4. Tamu Pihak (Sidang)
        $dataPihak = Pihak::whereYear('created_at', $currentYear)
                         ->whereMonth('created_at', $currentMonth)
                         ->get();
        $jumlahPihak = $dataPihak->count();


        // --- Memformat dan Menggabungkan Semua Data ---

        $dinasFormatted = $dataDinas->map(function ($item) {
            return [
                'jenis' => 'Dinas',
                'nama' => $item->nama,
                'keterangan' => 'Tamu Dinas - ' . $item->ke_bagian,
                'waktu' => $item->created_at,
            ];
        });

        $ptspFormatted = $dataPtsp->map(function ($item) {
            return [
                'jenis' => 'PTSP',
                'nama' => $item->nama,
                'keterangan' => 'Tamu PTSP - Meja ' . $item->ke_meja,
                'waktu' => $item->created_at,
            ];
        });

        $mahasiswaFormatted = $dataMahasiswa->map(function ($item) {
            return [
                'jenis' => 'Mahasiswa',
                'nama' => $item->nama,
                'keterangan' => 'Mahasiswa - ' . $item->universitas,
                'waktu' => $item->created_at,
            ];
        });

        $pihakFormatted = $dataPihak->map(function ($item) {
            return [
                'jenis' => 'Pihak',
                'nama' => $item->nama_pihak,
                'keterangan' => 'No. Perkara: ' . $item->nomor_perkara,
                'waktu' => $item->created_at,
            ];
        });

        // Menggabungkan semua data yang sudah diformat dan mengurutkannya
        $dataBulananLengkap = collect()
            ->merge($dinasFormatted)
            ->merge($ptspFormatted)
            ->merge($mahasiswaFormatted)
            ->merge($pihakFormatted)
            ->sortByDesc('waktu');

        // Mengirim semua data yang diperlukan ke view
        return view('laporanbulanan', compact(
            'dataBulananLengkap',
            'jumlahDinas',
            'jumlahPtsp',
            'jumlahMahasiswa',
            'jumlahPihak'
        ));
    }
}


