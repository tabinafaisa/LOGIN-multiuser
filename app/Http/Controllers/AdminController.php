<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;

class AdminController extends Controller
{
    public function index()
    {
        $siswa = Siswa::select('siswa.*', 'users.*', 'siswa.id as id')->join('users', 'siswa.user_id', 'users.id')->get();
        return view('admin.index', ['siswa' => $siswa]);
    }

    public function store(Request $request)
    {
        $datauser = [
            'username' => $request->username,
            'password' => $request->password,
            'hak_akses' => 'siswa'
        ];

        $user = User::create($datauser);

        $datasiswa = [
            'user_id' => $user->id,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ];

        Siswa::create($datasiswa);
        return redirect('/admin');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        Siswa::destroy($id);
        User::destroy($siswa->user_id);
        return redirect('/admin');
    }

    public function edit($id)
    {
        $siswa = Siswa::select('siswa.*', 'users.*', 'siswa.id as id')->join('users', 'siswa.user_id', 'users.id')->where('siswa.id', $id)->first();
        return redirect('/admin')->with('edit', $siswa);
    }

    public function update(Request $request)
    {

        $siswa = Siswa::find($request->id);

        $datauser = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $user = User::where('id', $siswa->user_id)->update($datauser);

        $datasiswa = [
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ];

        Siswa::where('id', $siswa->id)->update($datasiswa);

        return redirect('/admin');
    }
}
