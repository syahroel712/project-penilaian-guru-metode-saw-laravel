<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kriteria_Model;
use DB;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = DB::table('tb_kriteria')->get();

        return view(
            'page/kriteria/index',
            [
                'kriteria' => $kriteria
            ]
        );
    }
    public function create()
    {
        return view(
            'page/kriteria/form',
            [
                'url' => 'kriteria.store',
            ]
        );
    }
    public function store(Request $request, Kriteria_Model $kriteria)
    {
        $validator = Validator::make($request->all(), [
            'kriteria_nama'         => 'required',
            'kriteria_bobot'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('kriteria.create')
                ->withErrors($validator)
                ->withInput();
        } else {
    
            $kriteria->kriteria_nama = $request->input('kriteria_nama');
            $kriteria->kriteria_bobot = $request->input('kriteria_bobot');
            $kriteria->save();

            return redirect()
                ->route('kriteria')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Kriteria_Model $kriteria)
    {
        return view(
            'page/kriteria/form',
            [
                'kriteria' => $kriteria,
                'url' => 'kriteria.update',
            ]
        );
    }

    public function update(Request $request, Kriteria_Model $kriteria)
    {
        $validator = Validator::make($request->all(),[
            'kriteria_nama'         => 'required',
            'kriteria_bobot'    => 'required',
        ]);

        if($validator->fails()){
            return redirect()
                ->route('kriteria.update', $kriteria->kriteria_id)
                ->withErrors($validator)
                ->withInput();
        }else{

            $kriteria->kriteria_nama = $request->input('kriteria_nama');
            $kriteria->kriteria_bobot = $request->input('kriteria_bobot');
            $kriteria->save();

            return redirect()
                ->route('kriteria')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Kriteria_Model $kriteria)
    {
        $kriteria->forceDelete();
        return redirect()
            ->route('kriteria')
            ->with('message', 'Data berhasil dihapus');
    }
}
