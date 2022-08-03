<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jen;

class JenController extends Controller
{
    public function index()
    {
        $jenis = Jen::all();
        return view('jenis.index', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Jen::insert([
            'name' => $request->name,
            'note' => $request->note,
        ]);

        return redirect('jenis')->with('status', 'Berhasil ditambahkan');
    }

    public function delete(Jen $jen)
    {
        $jen->delete();
        return redirect('jenis')->with('status', 'Jenis Berhasil dihapus');
    }

    public function edit(Jen $jen)
    {
        $jenis = Jen::all();
        return view('jenis.edit', compact('jen', 'jenis'));
    }

    public function update(Request $request,Jen $jen)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $jen->update($request->all());

        return redirect('jenis')->with('status', 'Jenis berhasil dirubah');
    }
}
