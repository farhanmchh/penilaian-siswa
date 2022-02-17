<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Mengajar;

use Illuminate\Http\Request;

class KelasController extends Controller
{
  public function index()
  {
    return view('kelas/index', [
      'kelas' => Kelas::all()
    ]);
  }

  public function create()
  {
    return view('kelas/create', [
      'jurusan' => Jurusan::all()
    ]);
  }

  public function store(Request $request)
  {
    $data_kelas = $request->validate([
      'nama_kelas' => ['required'],
      'id_jurusan' => ['required'],
    ]);

    Kelas::create($data_kelas);

    return redirect('/kelas/index');
  }

  public function edit($id)
  {
    return view('kelas/edit', [
      'kelas' => Kelas::where('id_kelas', $id)->first(),
      'jurusan' => Jurusan::all()
    ]);
  }

  public function update(Request $request, $id)
  {
    $data_kelas = $request->validate([
      'nama_kelas' => ['required'],
      'id_jurusan' => ['required'],
    ]);

    Kelas::updateOrCreate(['id_kelas' => $id], $data_kelas);

    return redirect('/kelas/index');
  }

  public function destroy($id)
  {
    $siswa = Siswa::where('id_kelas', $id)->first();
    $mengajar = Mengajar::where('id_kelas', $id)->first();

    if ($mengajar) {
      return back()->with('error', 'Data kelas masih digunakan di menu mengajar!');
    }

    if ($siswa) {
      return back()->with('error', 'Data kelas masih digunakan di menu siswa!');
    }
    
    Kelas::where('id_kelas', $id)->delete();

    return back();
  }
}
