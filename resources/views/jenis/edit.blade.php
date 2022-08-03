<x-layout>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="bg-white-30 shadow-lg">
                    <div class="card-body">
                        <form action="{{ url('jenis/'.$jen->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                                <p class="h4">Tambah Jenis</p>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input value="{{ $jen->name }}" type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input value="{{ $jen->note }}" type="text" class="form-control" name="note">
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <p class="h3">Daftar Jenis</p>
                        <div class="card-text">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>###</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->note }}</td>
                                        <td>
                                            <a href="{{ url('jenis/'.$item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form class="d-inline" method="POST" action="{{ url('jenis/'.$item->id) }}">
                                                @method('delete')
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