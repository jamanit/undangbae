<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $business_profile->brand_name }} - Status Undangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
            font-size: 1.2em;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            font-size: 0.9em;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <h3>STATUS UNDANGAN</h3>

    <p><strong>Nama Pelanggan:</strong> {{ $invitation->user->full_name }}</p>
    <p><strong>Email Pelanggan:</strong> {{ $invitation->user->email }}</p>
    <p><strong>Kode Transaksi:</strong> {{ $invitation->transaction->transaction_code }}</p>
    <p><strong>Tanggal Transaksi:</strong> {{ $invitation->transaction->created_at }}</p>
    <p><strong>Kadaluarsa Undangan:</strong> {{ $invitation->expired_date }}</p>
    <p><strong>Jenis Undangan:</strong> {{ $invitation->template->template_type->template_type_name }}</p>
    <p><strong>Nama Templat:</strong> {{ $invitation->template->template_name }}</p>
    <p><strong>Status Undangan:</strong> {{ $invitation->invitation_status->invitation_status_name }}</p>

    <p><strong>Keterangan:</strong> {{ $invitation->invitation_status->description_status }} <a href="{{ $business_profile->brand_website }}">kunjungi website</a></p>

    <footer>
        <p>{{ $business_profile->brand_name }}</strong></p>
        <p>{{ $business_profile->business_name . ' ' . date('Y', strtotime($business_profile->business_founding_date)) }}</p>
    </footer>
</body>

</html>
