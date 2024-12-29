<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Perkembangan Ibu Hamil</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ibu</th>
                <th>Bulan Pemeriksaan</th>
                <th>Bulan Kehamilan</th>
                <th>Berat Badan</th>
                <th>Lingkar Perut</th>
                <th>Tekanan Darah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perkembangan as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->ibuHamil->Nama }}</td>
                    <td>{{ $data->Bulan->format('F Y') }}</td>
                    <td>{{ $data->BulanKehamilan }}</td>
                    <td>{{ $data->BeratBadan }} kg</td>
                    <td>{{ $data->LingkarPerut }} cm</td>
                    <td>{{ $data->TekananDarah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
