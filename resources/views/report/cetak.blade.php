<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-3">
        <div class="fixed-bottom d-print-none m-2">
            <a href="{{ url('report') }}" class="btn btn-success btn-sm">Kembali</a>
        </div>
        <table class="table table-bordered">
            <p class="m-0 p-0">Dicetak tanggal : {{ Carbon\Carbon::now()->translatedFormat('d F Y h:i') }} oleh : {{ $username }}</p>
            <thead>
                <tr>
                    <th class="text-center" colspan="4">Laporan Aktivitas Keuangan {{ $jen_name != null ? '(Hanya '.$jen_name->name.')' : '' }}
                        <br>
                        @if (Carbon\Carbon::parse($awal)->translatedFormat('d F Y') == Carbon\Carbon::parse($akhir)->translatedFormat('d F Y'))
                            Hari ini tanggal {{ Carbon\Carbon::parse($akhir)->translatedFormat('d F Y') }}
                        @else
                        {{ Carbon\Carbon::parse($awal)->translatedFormat('d F Y') }} sd {{ Carbon\Carbon::parse($akhir)->translatedFormat('d F Y') }}
                        @endif
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Tanggal | Jenis</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('d-m-Y') }}
                        @if ($item->jen->id == 1)
                        <span class="badge badge-success">{{ $item->jen->name }}</span>
                        @elseif ($item->jen->id == 2)
                        <span class="badge badge-warning">{{ $item->jen->name }}</span>
                        @else
                        <span class="badge badge-info">{{ $item->jen->name }}</span>
                        @endif
                    </td>
                    <td>{{ $item->note }}</td>
                    <td>@currency($item->nominal)</td>
                </tr>
                @endforeach
                @if ($jen_name == '')
                <tr class="bg-success text-white">
                    <td colspan="3">Total Pemasukan</td>
                    <td>@currency($pemasukan)</td>
                </tr>
                <tr class="bg-warning text-white">
                    <td colspan="3">Total Pengeluaran</td>
                    <td>@currency($pengeluaran)</td>
                </tr>
                <tr class="bg-primary text-white">
                    <td colspan="3">Saldo</td>
                    <td>@currency($saldo)</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>