<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function main()
  {
    return view('home');
  }

  public function loginAdmin(Request $request)
  {
    $administrator = Administrator::where('kode_admin', $request->kode_admin)->first();

    if (!$administrator) {
      return back();
    }

    if ($administrator->password != $request->password) {
      return back();
    }

    dd('admin berhasil login');
  }

  public function loginGuru(Request $request)
  {
    $guru = Guru::where('nip', $request->nip)->first();

    if (!$guru) {
      return back();
    }

    if ($guru->password != $request->password) {
      return back();
    }

    dd('guru berhasil login');
  }

  public function loginSiswa(Request $request)
  {
    $siswa = Siswa::where('nis', $request->nis)->first();

    if (!$siswa) {
      return back();
    }

    if ($siswa->password != $request->password) {
      return back();
    }

    dd('siswa berhasil login');
  }

  public function logout(Request $request)
  {
    $request->session()->invalidate();

    return redirect('/');
  }
}
