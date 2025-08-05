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

        $perkaras = DB::table('perkara')
            ->join('jadwalsidangweb', 'perkara.perkara_id', '=', 'jadwalsidangweb.IDPerkara')
            ->whereDate('jadwalsidangweb.tglSidang', $today)
            ->select('perkara.perkara_id', 'perkara.nomor_perkara')
            ->distinct()
            ->get();

        return view('form.pihak', compact('perkaras'));
    }
    
    public function getPihak($id)
    {
        $perkara = DB::table('perkara')->where('perkara_id', $id)->first();

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
}