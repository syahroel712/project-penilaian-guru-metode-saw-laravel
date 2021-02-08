<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kriteria_Penilaian_Model;
use App\Guru_Model;
use App\Sekolah_Model;
use DB;
use Illuminate\Support\Facades\Validator;

class AnalisaController extends Controller
{
    public function index()
    {
        // tampikan semua data
        $kriteria_penilaian = DB::table('tb_penilaian')
                            ->join('tb_guru', 'tb_guru.guru_id', '=', 'tb_penilaian.guru_id')
                            ->join('tb_sekolah', 'tb_sekolah.sekolah_id', '=', 'tb_guru.guru_id')
                            ->select('tb_penilaian.*', 'tb_sekolah.sekolah_nama', 'tb_guru.guru_nama')
                            ->selectRaw('(tb_penilaian.penilaian_portofolio + tb_penilaian.penilaian_presentasi + tb_penilaian.penilaian_wawancara + tb_penilaian.penilaian_tes_tulis) as total')
                            ->get();

        // tampilkan data nilai tertinggi
        $nilai_tertinggi = DB::table('tb_penilaian')
                            ->selectRaw("MAX(penilaian_portofolio) as penilaian_portofolio")
                            ->selectRaw("MAX(penilaian_presentasi) as penilaian_presentasi")
                            ->selectRaw("MAX(penilaian_wawancara) as penilaian_wawancara")
                            ->selectRaw("MAX(penilaian_tes_tulis) as penilaian_tes_tulis")
                            ->first();        
        // dd($nilai_tertinggi);
        
        // tampilkan bobot dari kriteria
        $bobot = DB::table('tb_kriteria')->select('kriteria_bobot')->get();
        $tmp = [];
        foreach ($bobot as $s) {
            $tmp[] = $s->kriteria_bobot;
        }

        return view(
            'page/analisa/index',
            [
                'kriteria_penilaian' => $kriteria_penilaian,
                'nilai_tertinggi' => $nilai_tertinggi,
                'bobot' => $tmp,
            ]
        );
    }

    public function cetak()
    {
        // tampikan semua data
        $kriteria_penilaian = DB::table('tb_penilaian')
                            ->join('tb_guru', 'tb_guru.guru_id', '=', 'tb_penilaian.guru_id')
                            ->join('tb_sekolah', 'tb_sekolah.sekolah_id', '=', 'tb_guru.guru_id')
                            ->select('tb_penilaian.*', 'tb_sekolah.sekolah_nama', 'tb_guru.guru_nama')
                            ->selectRaw('(tb_penilaian.penilaian_portofolio + tb_penilaian.penilaian_presentasi + tb_penilaian.penilaian_wawancara + tb_penilaian.penilaian_tes_tulis) as total')
                            ->get();

        // tampilkan data nilai tertinggi
        $nilai_tertinggi = DB::table('tb_penilaian')
                            ->selectRaw("MAX(penilaian_portofolio) as penilaian_portofolio")
                            ->selectRaw("MAX(penilaian_presentasi) as penilaian_presentasi")
                            ->selectRaw("MAX(penilaian_wawancara) as penilaian_wawancara")
                            ->selectRaw("MAX(penilaian_tes_tulis) as penilaian_tes_tulis")
                            ->first();        
        // dd($nilai_tertinggi);
        
        // tampilkan bobot dari kriteria
        $bobot = DB::table('tb_kriteria')->select('kriteria_bobot')->get();
        $tmp = [];
        foreach ($bobot as $s) {
            $tmp[] = $s->kriteria_bobot;
        }
        
        return view('page/analisa/cetak', 
            [
                'kriteria_penilaian' => $kriteria_penilaian,
                'nilai_tertinggi' => $nilai_tertinggi,
                'bobot' => $tmp,
            ]
        );
    }
}
