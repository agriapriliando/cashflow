<x-layout>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="bg-white-30 shadow-lg">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('act/'.$act->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <p class="h4">Tambah Aktivitas</p>
                            <div class="form-group">
                                <input value="{{ \Carbon\Carbon::parse($act->tanggal)->toDateString()}}" type="date" class="form-control" name="tanggal">
                            </div>
                            <div class="form-group">
                                <select name="jen_id" id="position" class="form-control">
                                    @foreach ($jenis as $item)
                                    <option value="{{ $item->id }}" {{ old('jen_id', $item->id) == $act->jen_id ? 'selected' : null }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input value="{{ $act->note }}" type="text" class="form-control" name="note">
                            </div>

                            <div class="form-group">
                                <label>Nominal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input value="{{ $act->nominal }}" type="number" class="form-control" name="nominal">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-2">
                <div class="bg-white-30 rounded-lg shadow-lg">
                    <div class="card-body">
                        <p class="h4">Cashflow Bulan Agustus 2022</p>
                        <div class="form-group row">
                            <label class="col-sm-3">Income</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="text" value="12.000.000" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3">Outcome</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="text" value="12.000.000" class="form-control" disabled>
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
                        <p class="h3">Daftar Aktivitas Keuangan</p>
                        <div class="card-text">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th>###</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ date_format($item->tanggal,"d-m-Y H:i") }}</td> --}}
                                        <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                        {{-- <td>{{ $item->tanggal }}</td> --}}
                                        <td>{{ $item->jen->name }}</td>
                                        <td>{{ $item->note }}</td>
                                        <td>{{ $item->nominal }}</td>
                                        <td>
                                            <a href="{{ url('act/'.$item->id) }}" class="btn btn-warning btn-sm"><i
                                                    class="bi bi-pencil"></i></a>
                                            <form class="d-inline" action="{{ url('act/'.$item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="confirm('Yakin ingin menghapus?')" type="submit"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>