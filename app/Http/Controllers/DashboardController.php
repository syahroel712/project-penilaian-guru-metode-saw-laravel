<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin_Model;
use App\Helper\JwtHelper;
use Illuminate\Support\Facades\Hash;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function loginAdmin(Request $request)
    {
        // cek data login
        $user = new Admin_Model();
        $data_user = $user->CheckLoginAdmin($request->input("admin_email"), $request->input("admin_password"));
        if ($data_user) {
            $token = JwtHelper::BuatToken($data_user);

            // masukan data login ke session
            $request->session()->put('admin_name', $data_user->admin_name);
            $request->session()->put('admin_email', $data_user->admin_email);
            $request->session()->put('admin_level', $data_user->admin_level);
            $request->session()->put('admin_id', $data_user->admin_id);
            $request->session()->put('token', $token);
            // redirect ke halaman home
            return redirect('dashboard')->with("pesan", "Selamat Datang " . session('admin_name'));
        } else {
            return back()->with("pesan", "Email atau Password Salah");
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerAdmin(Request $r)
    {
        $nama = "admin";
        $email = $r->admin_email;
        $password = $r->admin_password;
        $level = 'admin';
        $notelp = '0238423742';
        $pwd = Hash::make($password);

        $cek = DB::table('tb_admin')->where('admin_email', '=', $email)->first();
        // dd($cek);
        if ($cek != NULL) {
            return back()->with('error', 'Email Sudah Terdaftar');
        } else {
            $data = array(
                'admin_name' => $nama,
                'admin_email' => $email,
                'admin_password' => $pwd,
                'admin_notelp' => $notelp,
                'admin_level' => $level,
            );
            DB::table('tb_admin')->insert($data);
            return back()->with('pesan', 'Register Sukses');
        }
    }

    function logout(Request $request)
    {
        $request->session()->forget('nama_lengkap');
        $request->session()->forget('email');
        $request->session()->forget('level');
        $request->session()->forget('id_admin');
        $request->session()->forget('token');
        // redirect ke halaman home
        return redirect('/')->with("pesan", "Anda Sudah Logout");
    }

    public function dashboard()
    {
        return view('page/home');
    }
    
    public function tabel()
    {
        return view('page/contoh/index');
    }
}
