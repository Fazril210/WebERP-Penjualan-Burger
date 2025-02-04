<div class="content" style="background-color: #000; margin-bottom: 50px;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left: 20px; margin-top: 50px;">
        <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Daftar Penjualan</h1>

        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); max-width: 1200px; margin: auto;">
    <h3 style="font-size: 20px; font-weight: bold; text-align: center; color: black; margin-bottom: 20px;">Filter Data</h3>
    <div style="width: 100%; height: 2px; background-color: #000; margin-bottom: 20px;"></div>

    <!-- Filter Form -->
    <form id="filterForm" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; align-items: end;">
        <!-- Jenis Laporan -->
        <div style="display: flex; flex-direction: column;">
            <label for="filterType" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Pilih Jenis Laporan</label>
            <select id="filterType" class="form-control"
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s; width: 100%;">
                <option value="">Pilih Jenis Laporan</option>
                <option value="daily">Harian</option>
                <option value="monthly">Bulanan</option>
                <option value="yearly">Tahunan</option>
            </select>
        </div>

        <!-- Tanggal Laporan -->
        <div style="display: flex; flex-direction: column;">
            <label for="filterDate" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Pilih Tanggal</label>
            <input type="date" id="filterDate" class="form-control"
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s; width: 100%;"
                value="<?php echo date('Y-m-d'); ?>">
        </div>

        <!-- Tombol Cetak dan Export Excel -->
        <div style="display: flex; gap: 10px; justify-content: flex-end;">
            <button type="button" id="btnPrint" disabled
                style="padding: 12px 20px; font-weight: 500; border-radius: 6px; display: flex; align-items: center; gap: 8px; background-color: #28a745; border: none; color: white; transition: all 0.3s ease; cursor: pointer;">
                <i class="fas fa-print" style="font-size: 16px;"></i>
                <span>Cetak Laporan</span>
            </button>
            <button type="button" id="btnExportExcel"
                style="padding: 12px 20px; font-weight: 500; border-radius: 6px; display: flex; align-items: center; gap: 8px; background-color: #007bff; border: none; color: white; transition: all 0.3s ease; cursor: pointer;">
                <i class="fas fa-file-excel" style="font-size: 16px;"></i>
                <span>Export Excel</span>
            </button>
        </div>
    </form>
</div>





        <!-- Tabel Penjualan -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="salesTable">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tanggal</th>
                        <th>Pemasukan</th>
                        <th>Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="text-center">Silahkan pilih jenis laporan terlebih dahulu</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Set default date to today
    const today = new Date().toISOString().split('T')[0];
    $('#filterDate').val(today);
    
    // Set default filter type
    $('#filterType').val('daily');

    // Event listener untuk perubahan pada filterType
    $('#filterType').change(function() {
        if ($(this).val()) {
            fetchSalesReport();
        } else {
            // Reset tabel jika tidak ada jenis laporan yang dipilih
            $('#salesTable tbody').html('<tr><td colspan="4" class="text-center">Silahkan pilih jenis laporan terlebih dahulu</td></tr>');
            $('#btnPrint').prop('disabled', true); // Nonaktifkan tombol cetak
        }
    });

    // Event listener untuk tombol cetak
    $('#btnPrint').click(function() {
        printReport();
    });

    // Event listener untuk perubahan tanggal
    $('#filterDate').change(function() {
        if ($('#filterType').val()) {
            fetchSalesReport();
        }
    });

    // Event listener untuk tombol export excel
    $('#btnExportExcel').click(function() {
        const filterType = $('#filterType').val();
        const filterDate = $('#filterDate').val();

        if (!filterType || !filterDate) {
            alert('Silakan pilih jenis laporan dan tanggal terlebih dahulu');
            return;
        }

        // Tampilkan loading indicator
        const exportButton = document.getElementById('btnExportExcel');
        exportButton.disabled = true;
        exportButton.innerHTML = '<i class="fas fa-file-excel"></i> Membuat Excel...';

        // Redirect ke endpoint dengan query parameters
        window.open(`<?= site_url('kasir/export_report_excel') ?>?type=${filterType}&date=${filterDate}`, '_blank');

        // Reset tombol setelah beberapa detik
        setTimeout(() => {
            exportButton.disabled = false;
            exportButton.innerHTML = '<i class="fas fa-file-excel"></i> Export Excel';
        }, 2000);
    });
});

function fetchSalesReport() {
    const filterType = $('#filterType').val();
    const filterDate = $('#filterDate').val();

    if (!filterType) {
        $('#salesTable tbody').html('<tr><td colspan="4" class="text-center">Silahkan pilih jenis laporan terlebih dahulu</td></tr>');
        $('#btnPrint').prop('disabled', true); // Nonaktifkan tombol cetak
        return;
    }

    $.ajax({
        url: "<?php echo site_url('dashboard/get_sales_report'); ?>",
        method: "GET",
        data: { type: filterType, date: filterDate },
        dataType: "json",
        beforeSend: function() {
            $('#salesTable tbody').html('<tr><td colspan="4" class="text-center">Memuat data...</td></tr>');
        },
        success: function(data) {
            let html = '';
            let totalPemasukan = 0;

            if (data.length > 0) {
                data.forEach(function(sale, index) {
                    totalPemasukan += parseFloat(sale.final_price);
                    html += `
                        <tr>
                            <td>${sale.id_order}</td>
                            <td>${sale.order_date}</td>
                            <td>Rp ${parseFloat(sale.final_price).toLocaleString('id-ID')}</td>
                            <td>${sale.payment_method}</td>
                        </tr>`;
                });

                // Tambah baris total
                html += `
                    <tr class="table-info font-weight-bold">
                        <td colspan="2" class="text-right">Total Pemasukan:</td>
                        <td colspan="2">Rp ${totalPemasukan.toLocaleString('id-ID')}</td>
                    </tr>`;

                $('#btnPrint').prop('disabled', false); // Aktifkan tombol cetak
            } else {
                html = '<tr><td colspan="4" class="text-center">Tidak ada data penjualan</td></tr>';
                $('#btnPrint').prop('disabled', true); // Nonaktifkan tombol cetak
            }
            $('#salesTable tbody').html(html);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            $('#salesTable tbody').html('<tr><td colspan="4" class="text-center">Gagal memuat data penjualan</td></tr>');
            $('#btnPrint').prop('disabled', true); // Nonaktifkan tombol cetak
        }
    });
}



// Fungsi untuk mencetak laporan
function printReport() {
    const filterType = $('#filterType').val();
    const filterDate = $('#filterDate').val();
    const reportTitle = `Laporan Penjualan ${getReportTypeName(filterType)} - ${formatDate(filterDate)}`;
    
    const printWindow = window.open('', '_blank');
    if (!printWindow) {
        alert('Popup blocker mungkin menghalangi jendela cetak. Mohon izinkan popup untuk situs ini.');
        return;
    }

    // Perbaikan perhitungan total
    let totalPemasukan = 0;
    $('#salesTable tbody tr').not(':last').each(function() {
        // Ambil teks dari kolom pemasukan
        const amountText = $(this).find('td:eq(2)').text();
        // Bersihkan string dari 'Rp' dan tanda koma ribuan
        const cleanAmount = amountText.replace(/[Rp\s.,]/g, '');
        // Parse ke float
        const amount = parseFloat(cleanAmount);
        if (!isNaN(amount)) {
            totalPemasukan += amount;
        }
    });

    const tableData = $('#salesTable tbody tr').not(':last').map(function(index) {
        return {
            id: $(this).find('td:eq(0)').text(),
            date: $(this).find('td:eq(1)').text(),
            amount: $(this).find('td:eq(2)').text(),
            method: $(this).find('td:eq(3)').text()
        };
    }).get();

    const printContent = `
        <html>
        <head>
            <title>${reportTitle}</title>
            <style>
                @media print {
                    @page { margin: 2cm; }
                }
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
                .signature {
                    margin-top: 50px;
                    text-align: right;
                }
                .signature-line {
                    margin-top: 80px;
                    border-top: 1px solid #000;
                    width: 200px;
                    display: inline-block;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Laporan Penjualan</h1>
                <p>Periode: ${getReportTypeName(filterType)}</p>
                <p>Tanggal: ${formatDate(filterDate)}</p>
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
                    ${tableData.map((row, index) => `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${row.id}</td>
                            <td>${row.date}</td>
                            <td>${row.amount}</td>
                            <td>${row.method}</td>
                        </tr>
                    `).join('')}
                    <tr class="total-row">
                        <td colspan="3" style="text-align: right"><strong>Total Pemasukan:</strong></td>
                        <td colspan="2"><b>Rp ${totalPemasukan.toLocaleString('id-ID')}</b></td>
                    </tr>
                </tbody>
            </table>

            <div class="signature">
                <p>Tanggal Cetak: ${new Date().toLocaleDateString('id-ID')}</p>
                <div class="signature-line">
                    <p>Penanggung Jawab</p>
                </div>
            </div>
        </body>
        </html>
    `;

    printWindow.document.write(printContent);
    printWindow.document.close();

    setTimeout(() => {
        printWindow.print();
    }, 500);
}

// Fungsi helper
function getReportTypeName(type) {
    const types = {
        'daily': 'Harian',
        'monthly': 'Bulanan',
        'yearly': 'Tahunan'
    };
    return types[type] || type;
}

function formatDate(dateStr) {
    return new Date(dateStr).toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}
</script>