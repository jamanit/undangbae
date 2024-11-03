<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $business_profile->brand_name }} - Faktur Pembayaran</title>
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
    <h3>FAKTUR PEMBAYARAN</h3>

    <p><strong>Nama Pelanggan:</strong> {{ $transaction->invitation->user->full_name }}</p>
    <p><strong>Email Pelanggan:</strong> {{ $transaction->invitation->user->email }}</p>
    <p><strong>Kode Transaksi:</strong> {{ $transaction->transaction_code }}</p>
    <p><strong>Tanggal Transaksi:</strong> {{ $transaction->created_at }}</p>
    <p><strong>Kadaluarsa Undangan:</strong> {{ $transaction->invitation->expired_date }}</p>
    <p><strong>Jenis Undangan:</strong> {{ $transaction->invitation->template->template_type->template_type_name }}</p>
    <p><strong>Nama Templat:</strong> {{ $transaction->invitation->template->template_name }}</p>
    <p><strong>Status Undangan:</strong> {{ $transaction->invitation->invitation_status->invitation_status_name }}</p>

    <table>
        <thead>
            <tr>
                <th>Harga</th>
                <th>Diskon</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ 'Rp. ' . number_format($transaction->price) }}</td>
                <td>{{ $transaction->percent_discount . '%' }}</td>
                <td class="total">{{ 'Rp. ' . number_format($transaction->total_amount) }}</td>
            </tr>
        </tbody>
    </table>

    <p><strong>Keterangan:</strong> {{ $transaction->invitation->invitation_status->description_status }}</p>

    <footer>
        <p>{{ $business_profile->brand_name }}</strong></p>
        <p>{{ $business_profile->business_name . ' ' . date('Y', strtotime($business_profile->business_founding_date)) }}</p>
    </footer>
</body>

</html>
