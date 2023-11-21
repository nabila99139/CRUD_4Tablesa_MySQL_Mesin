<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('component/login');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('semua_table');
            } elseif (Auth::user()->role == 'super_admin') {
                return redirect('jenis_mesin');
            }
            // return redirect('semua_table')->with('success', Auth::user()->name . ' Berhasil login');
        } else {
            // return 'gagal';
            return redirect('/')->withErrors('Username atau Password salah');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Berhasil logout');
    }

    function register()
    {
        return view('component/register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,super_admin',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Anda sudah memiliki akun dengan email ini',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Masukkan minimal 6 karakter untuk password',
            'role.required' => 'Pilih peran (role)',
            'role.in' => 'Peran (role) tidak valid',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];
        User::create($data);

        $infoLogin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ];

        if (Auth::attempt($infoLogin)) {
            return redirect('semua_table')->with('success', Auth::user()->name . ' Berhasil login');
        } else {
            // return 'gagal';
            return redirect('/')->withErrors('Username atau Password salah');
        }
    }
}
