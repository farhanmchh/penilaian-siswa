<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mengajar;
use App\Models\Siswa;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
  public function index()
  {
    return view('nilai.index', [
      'nilai' => Nilai::all()
    ]);
  }

  public function create()
  {
    $mengajar = Mengajar::where('nip', session('nip'));

    return view('nilai.create', [
      'mengajar' => $mengajar->get(),
      'siswa' => Siswa::whereIn('id_kelas', $mengajar->get('id_kelas'))->get()
    ]);
  }

  public function store(Request $request)
  {
    $data_nilai = $request->validate([
      'id_mengajar' => ['required'],
      'nis' => ['required'],
      'uh' => ['required', 'numeric'],
      'uts' => ['required', 'numeric'],
      'uas' => ['required', 'numeric']
    ]);

    $uh = $request->uh;
    $uts = $request->uts;
    $uas = $request->uas;

    $data_nilai['na'] = round(($uh + $uts + $uas) / 3);

    Nilai::create($data_nilai);

    return redirect('/nilai/index');
  }

  public function edit(Request $request, $id)
  {
    $mengajar = Mengajar::where('nip', session('nip'));

    return view('nilai.edit', [
      'nilai' => Nilai::where('id_nilai', $id)->first(),
      'mengajar' => $mengajar->get(),
      'siswa' => Siswa::whereIn('id_kelas', $mengajar->get('id_kelas'))->get()
    ]);
  }

  public function update(Request $request, $id)
  {
    $data_nilai = $request->validate([
      'id_mengajar' => ['required'],
      'nis' => ['required'],
      'uh' => ['required', 'numeric'],
      'uts' => ['required', 'numeric'],
      'uas' => ['required', 'numeric']
    ]);

    $uh = $request->uh;
    $uts = $request->uts;
    $uas = $request->uas;

    $data_nilai['na'] = round(($uh + $uts + $uas) / 3);

    Nilai::where('id_nilai', $id)->update($data_nilai);

    return redirect('/nilai/index');
  }

  public function destroy($id)
  {
    Nilai::where('id_nilai', $id)->delete();

    return back();
  }
}
