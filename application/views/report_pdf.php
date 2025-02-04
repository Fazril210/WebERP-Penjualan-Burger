<!DOCTYPE html>
<html>
<head>
    <title>Report <?= $month . '-' . $year ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table thead {
            background-color: #007bff;
            color: white;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tbody tr:hover {
            background-color: #e9ecef;
        }
        th {
            text-transform: uppercase;
            font-size: 14px;
        }
        td {
            font-size: 13px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
        .total-row {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .total-row td {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Laporan Bulan <?= $month ?> Tahun <?= $year ?></h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah Terjual</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $grandTotal = 0; // Inisialisasi total pendapatan
                foreach ($report as $index => $item): 
                    $grandTotal += $item['total_revenue']; // Menambahkan pendapatan per item ke total
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($item['product_name']) ?></td>
                    <td><?= htmlspecialchars($item['quantity_sold']) ?></td>
                    <td>Rp <?= number_format($item['total_revenue'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="3" style="text-align: left;">Total Keseluruhan Pendapatan</td>
                <td style="text-align: left;">Rp <?= number_format($grandTotal, 0, ',', '.') ?></td>
            </tr>
        </tfoot>
    </table>
    <div class="footer">
        Laporan ini dihasilkan secara otomatis pada <?= date('d-m-Y') ?>.
    </div>
</body>
</html>
