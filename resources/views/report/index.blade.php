<x-layout>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <div class="bg-white-30 shadow-lg">
                    <p class="h4 text-center pt-4">Export Laporan Aktivitas</p>
                    <form action="" class="p-3">
                        <div class="card-body row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <select class="form-control" name="jenis_report">
                                        <option value="html">Format HTML</option>
                                        <option value="pdf">Format PDF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <select class="form-control" name="jenis_aktivitas" id="">
                                        <option value="all">Semua Jenis</option>
                                        <option value="1">Pemasukan</option>
                                        <option value="2">Pengeluaran</option>
                                        <option value="3">Transfer</option>
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
</x-layout>