<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pihak;
use App\Models\Dinas;
use App\Models\Ptsp;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\HarianExport;
use App\Exports\BulananExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $currentMonth = Carbon::now()->month;
        $jumlahHariIni = Dinas::whereDate('created_at', $today)->count()
                        + Ptsp::whereDate('created_at', $today)->count()
                        + Mahasiswa::whereDate('created_at', $today)->count()
                        + Pihak::whereDate('created_at', $today)->count();

        $jumlahDinas = Dinas::whereDate('created_at', $today)->count();
        $jumlahPtsp = Ptsp::whereDate('created_at', $today)->count();
        $jumlahMahasiswa = Mahasiswa::whereDate('created_at', $today)->count();
        $jumlahPihak = Pihak::whereDate('created_at', $today)->count();

       $daftarHariIniLengkap = collect();

    $daftarHariIniLengkap = $daftarHariIniLengkap->merge(Dinas::whereDate('created_at', $today)->get()->map(function ($item) {
        return [
            'jenis' => 'Dinas',
            'nama' => $item->nama,
            'keterangan' => $item->nama_kantor . ' - Tujuan: ' . $item->ke_bagian,
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
    $nomorPerkara = DB::connection('sipp')
        ->table('perkara')
        ->where('perkara_id', $item->nomor_perkara)
        ->value('nomor_perkara');
        return [
            'jenis' => 'Pihak',
            'nama' => $item->nama_pihak,
            'keterangan' => 'No. Perkara: ' . ($nomorPerkara ?? 'Tidak Ditemukan'),
            'waktu' => $item->created_at,
        ];
    }));

    $daftarHariIniLengkap = $daftarHariIniLengkap->sortByDesc('waktu');

    $dataBulananLengkap = collect();

    $dataBulananLengkap = $dataBulananLengkap->merge(Dinas::whereMonth('created_at', $currentMonth)->get()->map(function ($item) {
        return [
            'jenis' => 'Dinas',
            'nama' => $item->nama,
            'keterangan' => $item->nama_kantor . ' - Tujuan: ' . $item->ke_bagian,
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
        $now = Carbon::now();
        $currentMonth = $now->month;
        $currentYear = $now->year;


        $dataDinas = Dinas::whereYear('created_at', $currentYear)
                          ->whereMonth('created_at', $currentMonth)
                          ->get();
        $jumlahDinas = $dataDinas->count();

        $dataPtsp = Ptsp::whereYear('created_at', $currentYear)
                        ->whereMonth('created_at', $currentMonth)
                        ->get();
        $jumlahPtsp = $dataPtsp->count();

        $dataMahasiswa = Mahasiswa::whereYear('created_at', $currentYear)
                                  ->whereMonth('created_at', $currentMonth)
                                  ->get();
        $jumlahMahasiswa = $dataMahasiswa->count();

        $dataPihak = Pihak::whereYear('created_at', $currentYear)
                         ->whereMonth('created_at', $currentMonth)
                         ->get();
        $jumlahPihak = $dataPihak->count();

        $dinasFormatted = $dataDinas->map(function ($item) {
            return [
                'jenis' => 'Dinas',
                'nama' => $item->nama,
                'keterangan' => $item->nama_kantor . ' - Tujuan: ' . $item->ke_bagian,
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
        $nomorPerkara = DB::connection('sipp')
            ->table('perkara')
            ->where('perkara_id', $item->nomor_perkara)
            ->value('nomor_perkara');

        return [
            'jenis' => 'Pihak',
            'nama' => $item->nama_pihak,
            'keterangan' => 'No. Perkara: ' . ($nomorPerkara ?? 'Tidak Ditemukan'),
            'waktu' => $item->created_at,
        ];
        });

        $dataBulananLengkap = collect()
            ->merge($dinasFormatted)
            ->merge($ptspFormatted)
            ->merge($mahasiswaFormatted)
            ->merge($pihakFormatted)
            ->sortByDesc('waktu');

        return view('laporanbulanan', compact(
            'dataBulananLengkap',
            'jumlahDinas',
            'jumlahPtsp',
            'jumlahMahasiswa',
            'jumlahPihak'
        ));
    }
    public function exportHarian()
{
    $today = now()->toDateString();

    $pihak = Pihak::whereDate('created_at', $today)->get()->map(function ($item) {
    $nomorPerkara = DB::connection('sipp')
        ->table('perkara')
        ->where('perkara_id', $item->nomor_perkara)
        ->value('nomor_perkara');

    return [
        'nama' => $item->nama_pihak,
        'jenis' => 'Pihak',
        'keterangan' => 'No. Perkara: ' . ($nomorPerkara ?? 'Tidak Ditemukan'),
        'waktu' => $item->created_at,
    ];
    });

    $mahasiswa = Mahasiswa::whereDate('created_at', $today)->get()->map(function ($item) {
        return [
            'nama' => $item->nama,
            'jenis' => 'Mahasiswa',
            'keterangan' => $item->universitas,
            'waktu' => $item->created_at,
        ];
    });

    $ptsp = Ptsp::whereDate('created_at', $today)->get()->map(function ($item) {
        return [
            'nama' => $item->nama,
            'jenis' => 'PTSP',
            'keterangan' => 'Meja: ' . $item->ke_meja,
            'waktu' => $item->created_at,
        ];
    });

    $dinas = Dinas::whereDate('created_at', $today)->get()->map(function ($item) {
        return [
            'nama' => $item->nama,
            'jenis' => 'Dinas',
            'keterangan' => $item->nama_kantor . ' - Tujuan: ' . $item->ke_bagian,
            'waktu' => $item->created_at,
        ];
    });

    $dataGabungan = collect()
        ->merge($pihak)
        ->merge($mahasiswa)
        ->merge($ptsp)
        ->merge($dinas);

    return Excel::download(new HarianExport($dataGabungan), 'kehadiran-harian.xlsx');
}
public function exportBulanan(Request $request)
{
    $bulan = $request->input('bulan'); // Contoh: 2025-08

    if (!$bulan) {
        return back()->with('error', 'Bulan harus dipilih.');
    }

    $start = Carbon::parse($bulan)->startOfMonth();
    $end = Carbon::parse($bulan)->endOfMonth();

    $pihak = Pihak::whereBetween('created_at', [$start, $end])->get()->map(function ($item) {
    $nomorPerkara = DB::connection('sipp')
        ->table('perkara')
        ->where('perkara_id', $item->nomor_perkara)
        ->value('nomor_perkara');

    return [
        'nama' => $item->nama_pihak,
        'jenis' => 'Pihak',
        'keterangan' => 'No. Perkara: ' . ($nomorPerkara ?? 'Tidak Ditemukan'),
        'waktu' => $item->created_at,
    ];
    });

    $mahasiswa = Mahasiswa::whereBetween('created_at', [$start, $end])->get()->map(function ($item) {
        return [
            'nama' => $item->nama,
            'jenis' => 'Mahasiswa',
            'keterangan' => $item->universitas,
            'waktu' => $item->created_at,
        ];
    });

    $ptsp = Ptsp::whereBetween('created_at', [$start, $end])->get()->map(function ($item) {
        return [
            'nama' => $item->nama,
            'jenis' => 'PTSP',
            'keterangan' => 'Meja: ' . $item->ke_meja,
            'waktu' => $item->created_at,
        ];
    });

    $dinas = Dinas::whereBetween('created_at', [$start, $end])->get()->map(function ($item) {
        return [
            'nama' => $item->nama,
            'jenis' => 'Dinas',
            'keterangan' => $item->nama_kantor . ' - Tujuan: ' . $item->ke_bagian,
            'waktu' => $item->created_at,
        ];
    });

    $dataGabungan = collect()
        ->merge($pihak)
        ->merge($mahasiswa)
        ->merge($ptsp)
        ->merge($dinas)
        ->sortByDesc('waktu')
        ->values();

    return Excel::download(new BulananExport($dataGabungan), 'Laporan-Kunjungan-' . $bulan . '.xlsx');
}
}


