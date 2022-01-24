<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
  public function index()
  {
    return view('jurusan/index', [
      'jurusan' => Jurusan::all()
    ]);
  }

  public function create()
  {
    return view('jurusan/create');
  }

  public function store(Request $request)
  {
    $data_jurusan = $request->validate([
      'nama_jurusan' => ['required']
    ]);

    Jurusan::create($data_jurusan);

    return redirect('/jurusan/index');
  }

  public function edit($id)
  {
    return view('jurusan/edit', [
      'jurusan' => Jurusan::where('id_jurusan', $id)->first()
    ]);
  }

  public function update(Request $request, $id)
  {
    $data_jurusan = $request->validate([
      'nama_jurusan' => ['required']
    ]);

    Jurusan::updateOrCreate(['id_jurusan' => $id], $data_jurusan);

    return redirect('/jurusan/index');
  }

  public function destroy($id)
  {
    Jurusan::where('id_jurusan', $id)->delete();

    return back();
  }
}
