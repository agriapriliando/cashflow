<x-layout>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <p class="h4">Aktivitas Keuangan Lampau</p>
                        <p class="h6">{{ Carbon\Carbon::parse($tanggal_mulai)->translatedFormat('d F Y') }} sd {{ Carbon\Carbon::now()->subMonth()->endOfMonth()->translatedFormat('d F Y') }}</p>
                        <a href="{{ url('act') }}" class="btn btn-success">Kembali</a>
                        <div class="card-text mt-2">
                            <table id="data_all" class="table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th class="d-none d-sm-block">###</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acts_before as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ date_format($item->tanggal,"d-m-Y H:i") }}</td> --}}
                                        <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('d/m/Y') }}</td>
                                        <td>{{ $item->note }}
                                            @if ( $item->jen->id == 1 )
                                            <span class="badge badge-primary">{{ $item->jen->name }}</span>
                                            @endif
                                            @if ( $item->jen->id == 2 )
                                            <span class="badge badge-success">{{ $item->jen->name }}</span>
                                            @endif
                                            <br>
                                            <div class="d-sm-none mt-2">
                                                <a href="{{ url('act/'.$item->id) }}" class="btn btn-warning btn-sm"><i
                                                    class="bi bi-pencil"></i></a>
                                            <form class="d-inline" action="{{ url('act/'.$item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="confirm('Yakin ingin menghapus?')" type="submit"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </form>
                                        </td>
                                        <td>{{ $item->nominal }}</td>
                                        <td class="d-none d-sm-block">
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