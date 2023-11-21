<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Hasil;
use Illuminate\Support\Facades\View;

class SiswaController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::all();
        $model = Hasil::find(1);
        View::make('siswa.index')->withModel($model);
        return view('siswa.index', ['kandidat' => $kandidat, 'model' => $model]);
    }

    public function vote(Request $request)
    {
        // return Session::get('siswa');
        if (!Hasil::where('siswa_id', Session::get('siswa')->id)->count() > 0) {
            $data = [
                'kandidat_id' => $request->id,
                'siswa_id' => Session::get('siswa')->id,
                'tanggal_jam' => date('Y/m/d H:s:i'),
            ];

            Hasil::create($data);
        }


        // return $model;
        return redirect('/siswa');
    }
}
