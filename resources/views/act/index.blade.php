<x-layout>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="bg-white-30 shadow-lg rounded-lg">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('act') }}" method="post">
                            @method('POST')
                            @csrf
                            <p class="h4">Tambah Aktivitas</p>
                            <div class="form-group">
                                <input id="hariini" type="date" class="form-control" name="tanggal">
                            </div>
                            <div class="form-group">
                                <select name="jen_id" id="position" class="form-control">
                                    @foreach ($jenis as $item)
                                    @if ( old('jen_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="note" placeholder="Keterangan">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="number" class="form-control" name="nominal">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 row">
                <div class="col-sm-6 mt-2">
                    <div class="bg-white-30 rounded-lg shadow-lg">
                        <div class="card-body">
                            <p class="h4 text-center">Bulan Ini : {{ Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" value="Pemasukan" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" value="@currency($acts_pemasukan)" class="form-control text-right" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" value="Pengeluaran" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" value="@currency($acts_pengeluaran)" class="form-control text-right" disabled>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <input type="text" value="Saldo (Pemasukan - Pengeluaran)" class="form-control" disabled>
                                    <input type="text" value="= @currency($saldo)" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-2">
                    <div class="bg-white-30 rounded-lg shadow-lg">
                        <div class="card-body">
                            <p class="h4 text-center">Bulan Lalu : {{ Carbon\Carbon::now()->subMonth()->translatedFormat('F Y') }}</p>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" value="Pemasukan" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" value="@currency($acts_pemasukan_last)" class="form-control text-right" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" value="Pengeluaran" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" value="@currency($acts_pengeluaran_last)" class="form-control text-right" disabled>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <input type="text" value="Saldo (Pemasukan - Pengeluaran)" class="form-control" disabled>
                                    <input type="text" value="= @currency($saldo_last)" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <p class="h4">Bulan Ini : {{ Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
                        <div class="card-text">
                            <table id="zero_config" class="table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th class="d-none d-md-block">###</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ date_format($item->tanggal,"d-m-Y H:i") }}</td> --}}
                                        <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('d/m/Y') }}</td>
                                        <td>
                                            @if ( $item->jen->id == 1 )
                                            <span class="badge badge-primary">{{ $item->jen->name }}</span>
                                            @endif
                                            @if ( $item->jen->id == 2 )
                                            <span class="badge badge-success">{{ $item->jen->name }}</span>
                                            @endif
                                            <span class="badge badge-info">{{ $item->user->username }}</span>
                                            <br>
                                            {{ $item->note }}
                                            <br>
                                            <div class="d-md-none mt-2">
                                                <a href="{{ url('act/'.$item->id) }}" class="btn btn-warning btn-sm"><i
                                                    class="bi bi-pencil"></i></a>
                                            <form class="d-inline" action="{{ url('act/'.$item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Yakin ingin Hapus Data?')" type="submit"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </div>
                                            
                                        </form>
                                        </td>
                                        <td>@currency($item->nominal)</td>
                                        <td class="d-none d-md-block">
                                            <a href="{{ url('act/'.$item->id) }}" class="btn btn-warning btn-sm"><i
                                                    class="bi bi-pencil"></i></a>
                                            <form class="d-inline" action="{{ url('act/'.$item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Yakin ingin Hapus Data?')" type="submit"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th class="d-none d-sm-block">###</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>