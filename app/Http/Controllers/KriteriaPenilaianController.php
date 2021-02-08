<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kriteria_Penilaian_Model;
use App\Guru_Model;
use App\Sekolah_Model;
use DB;
use Illuminate\Support\Facades\Validator;

class KriteriaPenilaianController extends Controller
{
    public function index()
    {
        $kriteria_penilaian = DB::table('tb_penilaian')
                            ->join('tb_guru', 'tb_guru.guru_id', '=', 'tb_penilaian.guru_id')
                            ->join('tb_sekolah', 'tb_sekolah.sekolah_id', '=', 'tb_guru.guru_id')
                            ->select('tb_penilaian.*', 'tb_sekolah.sekolah_nama', 'tb_guru.guru_nama')
                            ->get();
        return view(
            'page/kriteria-penilaian/index',
            [
                'kriteria_penilaian' => $kriteria_penilaian
            ]
        );
    }
    public function create()
    {
        $guru = Guru_Model::all();
        return view(
            'page/kriteria-penilaian/form',
            [
                'url' => 'kriteria-penilaian.store',
                'guru' => $guru
            ]
        );
    }
    public function store(Request $request, Kriteria_Penilaian_Model $kriteria_penilaian)
    {
        $validator = Validator::make($request->all(), [
            'guru_id'               => 'required',
            'penilaian_portofolio'  => 'required',
            'penilaian_presentasi'  => 'required',
            'penilaian_wawancara'  => 'required',
            'penilaian_tes_tulis'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('kriteria-penilaian.create')
                ->withErrors($validator)
                ->withInput();
        } else {
    
            $kriteria_penilaian->guru_id = $request->input('guru_id');
            $kriteria_penilaian->penilaian_portofolio = $request->input('penilaian_portofolio');
            $kriteria_penilaian->penilaian_presentasi = $request->input('penilaian_presentasi');
            $kriteria_penilaian->penilaian_wawancara = $request->input('penilaian_wawancara');
            $kriteria_penilaian->penilaian_tes_tulis = $request->input('penilaian_tes_tulis');
            $kriteria_penilaian->save();

            return redirect()
                ->route('kriteria-penilaian')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Kriteria_Penilaian_Model $kriteria_penilaian)
    {
        $guru = Guru_Model::all();
        return view(
            'page/kriteria-penilaian/form',
            [
                'kriteria_penilaian' => $kriteria_penilaian,
                'guru' => $guru,
                'url' => 'kriteria-penilaian.update',
            ]
        );
    }

    public function update(Request $request, Kriteria_Penilaian_Model $kriteria_penilaian)
    {
        $validator = Validator::make($request->all(), [
            'guru_id'               => 'required',
            'penilaian_portofolio'  => 'required',
            'penilaian_presentasi'  => 'required',
            'penilaian_wawancara'  => 'required',
            'penilaian_tes_tulis'  => 'required',
        ]);

        if($validator->fails()){
            return redirect()
                ->route('kriteria-penilaian.update', $kriteria_penilaian->penilaian_id)
                ->withErrors($validator)
                ->withInput();
        }else{

            $kriteria_penilaian->guru_id = $request->input('guru_id');
            $kriteria_penilaian->penilaian_portofolio = $request->input('penilaian_portofolio');
            $kriteria_penilaian->penilaian_presentasi = $request->input('penilaian_presentasi');
            $kriteria_penilaian->penilaian_wawancara = $request->input('penilaian_wawancara');
            $kriteria_penilaian->penilaian_tes_tulis = $request->input('penilaian_tes_tulis');
            $kriteria_penilaian->save();

            return redirect()
                ->route('kriteria-penilaian')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Kriteria_Penilaian_Model $kriteria_penilaian)
    {
        $kriteria_penilaian->forceDelete();
        return redirect()
            ->route('kriteria-penilaian')
            ->with('message', 'Data berhasil dihapus');
    }
}
