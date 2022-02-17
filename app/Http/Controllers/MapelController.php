<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Mengajar;

use Illuminate\Http\Request;

class MapelController extends Controller
{
  public function index()
  {
    return view('mapel/index', [
      'mapel' => Mapel::all()
    ]);
  }

  public function create()
  {
    return view('mapel/create');
  }

  public function store(Request $request)
  {
    $data_mapel = $request->validate([
      'nama_mapel' => ['required']
    ]);

    Mapel::create($data_mapel);

    return redirect('/mapel/index');
  }

  public function edit($id)
  {
    return view('mapel/edit', [
      'mapel' => Mapel::where('id_mapel', $id)->first()
    ]);
  }

  public function update(Request $request, $id)
  {
    $data_mapel = $request->validate([
      'nama_mapel' => ['required']
    ]);

    Mapel::where('id_mapel', $id)->update($data_mapel);
    return redirect('/mapel/index');
  }

  public function destroy($id)
  {
    $mengajar = Mengajar::where('id_mapel', $id)->first();

    if ($mengajar) {
      return back()->with('error', 'Data mapel masih digunakan di menu mengajar!');
    }
    
    Mapel::where('id_mapel', $id)->delete();

    return back();
  }
}
