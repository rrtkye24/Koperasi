<?php

use Illuminate\Database\Seeder;
use App\Anggota;
use App\User;
use App\UserAnggota;
use Laratrust\Models\LaratrustRole as Role;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $anggota = new Anggota();
        $anggota->nama_pengguna = '320209040401001';
        $anggota->nama = 'Agus Permana';
        $anggota->tempat_lahir = 'Padang';
        $anggota->tanggal_lahir = '2022-10-05';
        $anggota->jabatan = 'Kepala Sekolah';
        $anggota->status_menikah = 'Menikah';
        $anggota->nama_pasangan = 'Ibu Pertiwi Widyoningrat';
        $anggota->no_tlp = '081266506886';
        $anggota->tmp_daftar = 'Semarang';
        $anggota->tgl_daftar = '2020-10-05';
        $anggota->status = '1';
        $anggota->save();

        $user = User::create([
            'name' => $anggota->nama,
            'email' => $anggota->nik,
            'password' => bcrypt('koperasibn')
        ]);

        $user_anggota = new UserAnggota();
        $user_anggota->anggota_id = $anggota->id;
        $user_anggota->user_id = $user->id;
        $user_anggota->save();
        $roleUser = Role::where('name', 'member')->first();
        $user->attachRole($roleUser);
    }
}
