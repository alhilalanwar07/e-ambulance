<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pemesanan Ambulance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2;}

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div style="text-align: center">
        <h1>Laporan Pemesanan Ambulance</h1>
    </div>
    <hr>
    <div style="text-align: center">
        <h3>{{ date('d F Y', strtotime($startDate)) }} - {{ date('d F Y', strtotime($endDate)) }}</h3>
    </div>
    <hr>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama Rumah Sakit</th>
                <th>Nama Pasien</th>
                <th>Alamat Jemput</th>
                <th>Supir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanans as $pesanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d F Y', strtotime($pesanan->created_at)) }}</td>
                    <td>{{ $pesanan->rumahsakit->nama }}</td>
                    <td>{{ $pesanan->nama_pasien }}</td>
                    <td>{{ $pesanan->alamat_jemput }}</td>
                    <td>{{ $pesanan->supir->nama }}</td>
                    <td>{{ $pesanan->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <div style="text-align: center">
        <h3>Tanggetada, {{ date('d F Y') }}</h3>
        <h3>Kepala Puskesmas Tanggetada</h3>
        <br><br><br>
        <h3 style="text-decoration: underline;">YUSUF WAWAN. SS, SKM</h3>
    </div>
</body>
</html>
