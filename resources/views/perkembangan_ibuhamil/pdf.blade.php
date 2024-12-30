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
    <h2 style="text-align: center;">{{ $title }}</h2>
    
    @if(count($perkembangan) > 0 && $perkembangan->first()->ibu_hamil_id)
    <div style="margin-bottom: 20px;">
        <p><strong>Nama:</strong> {{ $perkembangan->first()->ibuHamil->Nama }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $perkembangan->first()->ibuHamil->TanggalLahir }}</p>
        <p><strong>Alamat:</strong> {{ $perkembangan->first()->ibuHamil->Alamat }}</p>
    </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                @if(!isset($perkembangan->first()->ibu_hamil_id))
                <th>Nama Ibu</th>
                @endif
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
                    @if(!isset($perkembangan->first()->ibu_hamil_id))
                    <td>{{ $data->ibuHamil->Nama }}</td>
                    @endif
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