<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Jam</th>
                <th>Full Nama</th>
                <th>Username</th>
                <th>Jabatan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($export as $t)
            <tr>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->user->fullname }}</td>
                <td>{{ $t->user->username }}</td>
                <td>{{ $t->user->position->position_name }}</td>
                <td>{{ 'Rp. ' . number_format($t->total_price, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
