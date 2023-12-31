<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        $check = Auth::attempt($validate);

        if ($check) {
            if (auth()->user()->hak_akses == 'admin') {
                return redirect('/admin');
            }
            $siswa = Siswa::where('user_id', Auth::user()->id)->first();
            Session::put('siswa', $siswa);
            return redirect('/siswa');
        }
        return redirect('/login')->with('notif', [
            'status' => false,
            'msg' => 'username atau password tidak valid'
        ]);
    }
}
