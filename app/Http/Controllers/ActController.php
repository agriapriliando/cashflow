<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Jen;
use Illuminate\Http\Request;

class ActController extends Controller
{
    public function index()
    {
        $acts = Act::with('user')->get();
        $jenis = Jen::all();
        return view('act.index', compact('acts','jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required',
            'nominal' => 'required'
        ]);

        Act::insert([
            'user_id' => 1,
            'jen_id' => $request->jen_id,
            'tanggal' => $request->tanggal,
            'note' => $request->note,
            'nominal' => $request->nominal,
        ]);

        return redirect('/')->with('status', 'Aktivitas berhasil ditambahkan');
    }

    public function delete(Act $act)
    {
        $act->delete();
        return redirect('/')->with('status', 'Aktivitas Berhasil Dihapus');
    }

    public function edit(Act $act)
    {
        $acts = Act::with('user', 'jen')->get();
        $jenis = Jen::all();
        return view('act.edit', compact('act', 'acts', 'jenis'));
    }

    public function update(Request $request, Act $act)
    {
        $request->validate([
            'note' => 'required',
            'nominal' => 'required'
        ]);

        $act->update([
            'user_id' => 1,
            'jen_id' => $request->jen_id,
            'tanggal' => $request->tanggal,
            'note' => $request->note,
            'nominal' => $request->nominal,
        ]);

        return redirect('/')->with('status', 'Aktivitas Berhasil Dirubah');
    }
}
