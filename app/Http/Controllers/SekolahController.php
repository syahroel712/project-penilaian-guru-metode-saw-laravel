<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sekolah_Model;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah_Model::all();
        return view(
            'page/sekolah/index',
            [
                'sekolah' => $sekolah
            ]
        );
    }
    public function create()
    {
        return view(
            'page/sekolah/form',
            [
                'url' => 'sekolah.store'
            ]
        );
    }
    public function store(Request $request, Sekolah_Model $sekolah)
    {
        $validator = Validator::make($request->all(), [
            'sekolah_npsn'         => 'required',
            'sekolah_nama'         => 'required',
            'sekolah_alamat'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('sekolah.create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $sekolah->sekolah_npsn = $request->input('sekolah_npsn');
            $sekolah->sekolah_nama = $request->input('sekolah_nama');
            $sekolah->sekolah_alamat = $request->input('sekolah_alamat');
            $sekolah->save();

            return redirect()
                ->route('sekolah')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Sekolah_Model $sekolah)
    {
        return view(
            'page/sekolah/form',
            [
                'sekolah' => $sekolah,
                'url' => 'sekolah.update',
            ]
        );
    }

    public function update(Request $request, Sekolah_Model $sekolah)
    {
        $validator = Validator::make($request->all(),[
            'sekolah_npsn'         => 'required',
            'sekolah_nama'         => 'required',
            'sekolah_alamat'         => 'required',
        ]);

        if($validator->fails()){
            return redirect()
                ->route('sekolah.update', $sekolah->sekolah_id)
                ->withErrors($validator)
                ->withInput();
        }else{

            $sekolah->sekolah_npsn = $request->input('sekolah_npsn');
            $sekolah->sekolah_nama = $request->input('sekolah_nama');
            $sekolah->sekolah_alamat = $request->input('sekolah_alamat');
            $sekolah->save();

            return redirect()
                ->route('sekolah')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Sekolah_Model $sekolah)
    {
        $sekolah->forceDelete();
        return redirect()
            ->route('sekolah')
            ->with('message', 'Data berhasil dihapus');
    }
}
