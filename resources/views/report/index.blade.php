<x-layout>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <div class="bg-white-30 shadow-lg">
                    <p class="h4 text-center pt-4">Export Laporan Aktivitas <br>
                    <span class="badge badge-success">Sekarang : {{ Carbon\Carbon::now()->translatedFormat('d F Y h:i') }} WIB</span></p>
                    <form action="{{ url('report/cetak') }}" class="p-3" method="POST">
                        @method('POST')
                        @csrf
                        <div class="card-body row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <input id="tglawal" type="date" class="form-control" name="awal">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <input id="tglakhir" type="date" class="form-control" name="akhir">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <select class="form-control" name="format">
                                        <option value="html">Format HTML</option>
                                        <option value="pdf">Format PDF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <select class="form-control" name="jen_id">
                                        <option value="all">Semua Jenis</option>
                                        @foreach ($jens as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-success">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('tglawal').valueAsDate = new Date();
        document.getElementById('tglakhir').valueAsDate = new Date();
    </script>
</x-layout>