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
                            <p class="h4">Edit Aktivitas</p>
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
                            <a href="{{ url('act') }}" class="btn btn-primary btn-sm">Batal | Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>