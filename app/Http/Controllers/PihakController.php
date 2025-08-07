<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PihakController extends Controller
{
    public function create()
    {
        $today = Carbon::today()->toDateString();


        $perkaras = DB::connection('sipp')->table('perkara')
            ->join('jadwalsidangweb', 'perkara.perkara_id', '=', 'jadwalsidangweb.IDPerkara')
            ->whereDate('jadwalsidangweb.tglSidang', $today)
            ->select('perkara.perkara_id', 'perkara.nomor_perkara')
            ->distinct()
            ->get();

        return view('form.pihak', compact('perkaras'));
    }

    public function getPihak($id)
    {
        $perkara = DB::connection('sipp')->table('perkara')->where('perkara_id', $id)->first();


        $pihakList = [];

        if ($perkara) {
            for ($i = 1; $i <= 4; $i++) {
                $pihakField = "pihak{$i}_text";
                $pengacaraField = "pengacara_pihak{$i}";

                if (!empty($perkara->$pihakField)) {
                    $pihakList[] = $perkara->$pihakField;
                }

                if (!empty($perkara->$pengacaraField)) {
                    $pihakList[] = $perkara->$pengacaraField;
                }
            }
        }

        return response()->json($pihakList);
    }

    public function kehadiran($perkara_id = null)
    {
        $today = Carbon::today()->toDateString();

        $perkaras = DB::connection('sipp')->table('perkara')
            ->join('jadwalsidangweb', 'perkara.perkara_id', '=', 'jadwalsidangweb.IDPerkara')
            ->whereDate('jadwalsidangweb.tglSidang', $today)
            ->select('perkara.perkara_id', 'perkara.nomor_perkara')
            ->distinct()
            ->get();

        $pihakStatusList = collect();

        if ($perkara_id) {
            $perkara = DB::connection('sipp')->table('perkara')->where('perkara_id', $perkara_id)->first();

            if ($perkara) {
                $pihakSemua = [];

                for ($i = 1; $i <= 4; $i++) {
                    $pihakField = "pihak{$i}_text";
                    $pengacaraField = "pengacara_pihak{$i}";

                    if (!empty($perkara->$pihakField)) {
                        $pihakSemua[] = $perkara->$pihakField;
                    }

                    if (!empty($perkara->$pengacaraField)) {
                        $pihakSemua[] = $perkara->$pengacaraField;
                    }
                }

                foreach ($pihakSemua as $pihakNama) {
                    $sudahHadir = DB::table('pihaks')
                        ->where('nomor_perkara', $perkara_id)
                        ->where('nama_pihak', $pihakNama)
                        ->whereDate('created_at', $today)
                        ->exists();

                    $pihakStatusList->push([
                        'nama' => $pihakNama,
                        'status' => $sudahHadir ? 'Hadir' : 'Belum Hadir'
                    ]);
                }
            }
        }

        return view('kehadiran', compact('perkaras', 'pihakStatusList', 'perkara_id'));
    }

    public function kehadiranByPerkara($nomor_perkara)
    {
        $today = Carbon::today()->toDateString();

        $perkara = DB::connection('sipp')->table('perkara')->where('perkara_id', $nomor_perkara)->first();

        $pihakList = [];

        if ($perkara) {
            for ($i = 1; $i <= 4; $i++) {
                $pihakField = "pihak{$i}_text";
                $pengacaraField = "pengacara_pihak{$i}";

                if (!empty($perkara->$pihakField)) {
                    $pihakList[] = [
                        'nama' => $perkara->$pihakField,
                        'status' => 'Belum Hadir'
                    ];
                }

                if (!empty($perkara->$pengacaraField)) {
                    $pihakList[] = [
                        'nama' => $perkara->$pengacaraField,
                        'status' => 'Belum Hadir'
                    ];
                }
            }
        }

        $kehadiranHariIni = DB::table('pihaks')
            ->where('nomor_perkara', $nomor_perkara)
            ->whereDate('created_at', $today)
            ->pluck('nama_pihak')
            ->toArray();

        foreach ($pihakList as &$p) {
            if (in_array($p['nama'], $kehadiranHariIni)) {
                $p['status'] = 'Hadir';
            }
        }

        $perkaras = DB::connection('sipp')->table('perkara')
            ->join('jadwalsidangweb', 'perkara.perkara_id', '=', 'jadwalsidangweb.IDPerkara')
            ->whereDate('jadwalsidangweb.tglSidang', $today)
            ->select('perkara.perkara_id', 'perkara.nomor_perkara')
            ->distinct()
            ->get();

        return view('kehadiran', [
            'pihaks' => $pihakList,
            'selectedPerkara' => $nomor_perkara,
            'perkaras' => $perkaras
        ]);
    }
}
