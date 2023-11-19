<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\Siswa;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datauser = [
            'username' => 'adminpemilos',
            'password' => Hash::make('12345678'),
            'hak_akses' => 'admin',
        ];

        $user = User::create($datauser);

        $admin = [
            'user_id' => $user->id,
            'nama' => 'tabina faisa',
        ];

        Admin::create($admin);

        $datauser = [
            'username' => 'siswasiswi',
            'password' => Hash::make('12345678'),
            'hak_akses' => 'siswa',
        ];

        $user = User::create($datauser);

        $siswa = [
            'user_id' => $user->id,
            'nama' => 'tabina',
            'kelas' => 'XII RPL 1',
        ];

        Siswa::create($siswa);
    }
}
