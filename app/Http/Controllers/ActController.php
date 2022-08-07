<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Jen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    
    public function index()
    {
        // return url()->current();
        $bulanini = Carbon::now()->month;
        $bulanlalu = Carbon::now()->subMonth()->month;
        $acts = Act::with('user','jen')->orderBy('tanggal')->whereMonth('tanggal', $bulanini)->get();
        $acts_pemasukan = Act::whereMonth('tanggal', $bulanini)->where('jen_id', 1)->get()->sum('nominal');
        $acts_pengeluaran = Act::whereMonth('tanggal', $bulanini)->where('jen_id', 2)->get()->sum('nominal');
        $saldo = $acts_pemasukan - $acts_pengeluaran;
        $acts_pemasukan_last = Act::whereMonth('tanggal', $bulanlalu)->where('jen_id', 1)->get()->sum('nominal');
        $acts_pengeluaran_last = Act::whereMonth('tanggal', $bulanlalu)->where('jen_id', 2)->get()->sum('nominal');
        $saldo_last = $acts_pemasukan_last - $acts_pengeluaran_last;
        $jenis = Jen::all();
        return view('act.index', 
        compact(
            'acts','jenis','acts_pemasukan','acts_pengeluaran','saldo',
            'acts_pemasukan_last','acts_pengeluaran_last','saldo_last'
        ));
    }

    public function before()
    {
        $acts_before = Act::with('user')->orderBy('tanggal')->whereMonth('tanggal','<', Carbon::now()->month)->get();
        $tanggal_mulai = Act::orderBy('tanggal')->pluck('tanggal')->first();
        return view('act.before', compact('acts_before','tanggal_mulai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required',
            'nominal' => 'required'
        ]);

        Act::insert([
            'user_id' => Auth::id(),
            'jen_id' => $request->jen_id,
            'tanggal' => $request->tanggal,
            'note' => $request->note,
            'nominal' => $request->nominal,
        ]);

        return redirect('act')->with('status', 'Aktivitas berhasil ditambahkan');
    }

    public function delete(Act $act)
    {
        $act->delete();
        return redirect('act')->with('status', 'Aktivitas Berhasil Dihapus');
    }

    public function edit(Act $act)
    {
        $jenis = Jen::all();
        return view('act.edit', compact('act', 'jenis'));
    }

    public function update(Request $request, Act $act)
    {
        $request->validate([
            'note' => 'required',
            'nominal' => 'required'
        ]);

        $act->update([
            'jen_id' => $request->jen_id,
            'tanggal' => $request->tanggal,
            'note' => $request->note,
            'nominal' => $request->nominal,
        ]);

        return redirect('act')->with('status', 'Aktivitas Berhasil Dirubah');
    }
}
