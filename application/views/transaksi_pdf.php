<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan <?= $type ?> - <?= $date ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .total-row {
            font-weight: bold;
            background-color: #f8f9fa;
        }
        .total-row td {
            text-align: right;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .signature-line {
            margin-top: 80px;
            border-top: 1px solid #000;
            width: 200px;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Penjualan</h1>
        <p>Periode: <?= ucfirst($type) ?></p>
        <p>Tanggal: <?= $date ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <th>Metode Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($sales as $index => $sale): 
                $total += $sale->final_price;
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $sale->id_order ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($sale->order_date)) ?></td>
                    <td>Rp <?= number_format($sale->final_price, 0, ',', '.') ?></td>
                    <td><?= $sale->payment_method ?></td>
                </tr>
            <?php endforeach; ?>
            <tr class="total-row">
                <td colspan="3" style="text-align: right"><strong>Total Pemasukan:</strong></td>
                <td colspan="2"><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
            </tr>
        </tbody>
    </table>

    <div class="signature">
        <p>Tanggal Cetak: <?= date('d-m-Y') ?></p>
        <div class="signature-line">
            <p>Penanggung Jawab</p>
        </div>
    </div>
</body>
</html>
