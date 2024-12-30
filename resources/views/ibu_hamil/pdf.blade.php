<!DOCTYPE html>
<html>
<head>
    <title>Data Ibu Hamil</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #205937;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Data Ibu Hamil</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ibu</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Kehamilan Ke</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ibuHamil as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->Nama }}</td>
                    <td>{{ $data->TanggalLahir }}</td>
                    <td>{{ $data->NoTelepon }}</td>
                    <td>{{ $data->Alamat }}</td>
                    <td>{{ $data->kehamilan_ke }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>