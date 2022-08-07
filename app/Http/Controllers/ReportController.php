<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Jen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $jens = Jen::all();
        return view('report.index', compact('jens'));
    }

    public function report(Request $request)
    {
        $username = Auth::user()->username;
        // return $username;
        $awal = $request->awal;
        $akhir = $request->akhir;
        $format = $request->format;
        $jen_id = $request->jen_id;
        $jen_name = '';
        if (is_null($awal))
        {
            $awal = Carbon::now()->startOfDay();
        }
        if (is_null($akhir))
        {
            $akhir = Carbon::now();
        }
        if ($jen_id == 'all')
        {
            $data = Act::with('user','jen')->whereBetween('tanggal', [$awal, $akhir])->get();
        } else {
            $data = Act::with('user','jen')->where('jen_id', $jen_id)->whereBetween('tanggal', [$awal, $akhir])->get();
            $jen_name = Jen::find($jen_id);
        }
        $pemasukan = 0;
        $pengeluaran = 0;
        foreach ($data as $item)
        {
            if($item->jen_id == 1)
            {
                $pemasukan += $item->nominal;
            }
            if($item->jen_id == 2)
            {
                $pengeluaran += $item->nominal;
            }
        }
        $saldo = $pemasukan - $pengeluaran;

        return view('report.cetak',
        compact('awal','akhir','data','jen_name','username','pemasukan','pengeluaran','saldo'));
    }
}
