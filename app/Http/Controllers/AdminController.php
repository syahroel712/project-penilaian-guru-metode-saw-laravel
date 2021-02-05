<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin_Model;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin_Model::all();
        return view(
            'page/admin/index',
            [
                'admin' => $admin
            ]
        );
    }
    public function create()
    {
        return view(
            'page/admin/form',
            [
                'url' => 'admin.store'
            ]
        );
    }
    public function store(Request $request, Admin_Model $admin)
    {
        $validator = Validator::make($request->all(), [
            'admin_name'         => 'required',
            'admin_email'         => 'required|email|unique:tb_admin,admin_email',
            'admin_password'         => 'required',
            'admin_notelp'         => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $password = $request->input('admin_password');
            $pwd = Hash::make($password);
    
            $admin->admin_name = $request->input('admin_name');
            $admin->admin_email = $request->input('admin_email');
            $admin->admin_notelp = $request->input('admin_notelp');
            $admin->admin_level = 'admin';
            $admin->admin_password = $pwd;
            $admin->save();

            return redirect()
                ->route('admin')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Admin_Model $admin)
    {
        return view(
            'page/admin/form',
            [
                'admin' => $admin,
                'url' => 'admin.update',
            ]
        );
    }

    public function update(Request $request, Admin_Model $admin)
    {
        $validator = Validator::make($request->all(),[
            'admin_name'         => 'required',
            'admin_email'         => 'required|email',
            // 'admin_email'         => 'required|email|unique:admin,admin_email',Rule::unique('admin')->ignore($admin->admin_id),
            'admin_notelp'         => 'required|numeric',
        ]);

        if($validator->fails()){
            return redirect()
                ->route('admin.update', $admin->admin_id)
                ->withErrors($validator)
                ->withInput();
        }else{
            if ($request->input('admin_password') != null) {
                $password = $request->input('admin_password');
                $pwd = Hash::make($password);
                $admin->admin_password = $pwd;
            }

            $admin->admin_name = $request->input('admin_name');
            $admin->admin_email = $request->input('admin_email');
            $admin->admin_notelp = $request->input('admin_notelp');
            $admin->save();

            return redirect()
                ->route('admin')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Admin_Model $admin)
    {
        $admin->forceDelete();
        return redirect()
            ->route('admin')
            ->with('message', 'Data berhasil dihapus');
    }
}
