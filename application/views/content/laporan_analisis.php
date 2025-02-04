<div class="content" style="
    background: #000;
    padding: 20px;
    font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
">
    <div class="dashboard-wrapper" style="
        border-left: 3px solid red;
        box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5);
        padding: 15px;
        margin-bottom: 50px;
        border-radius: 10px;
        margin-left: 10px;
        margin-top: 50px;
    ">
        <h1 style="
            color: #ffffff;
            text-align: center;
            margin-bottom: 25px;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -1px;
        ">
            Laporan dan Analisis
        </h1>

        <!-- Filter dan Statistik -->
        <div style="display: flex; flex-direction: column; gap: 20px; margin-bottom: 30px;">
            <!-- Filter Section -->
            <div style="flex: 1;">
                <div style="
                    background: linear-gradient(145deg, #383838 0%, #2a2a2a 100%);
                    border-radius: 12px;
                    padding: 20px;
                    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
                    transition: transform 0.3s ease;
                ">
                    <h5 style="
                        color: #ffc107;
                        font-weight: 700;
                        margin-bottom: 15px;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                    ">
                        Filter Periode
                    </h5>
                    <div style="margin-bottom: 15px;">
                        <label style="
                            color: #e0e0e0;
                            display: block;
                            margin-bottom: 5px;
                            font-weight: 500;
                        ">
                            Jenis Laporan
                        </label>
                        <select id="filterType" style="
                            width: 100%;
                            padding: 10px;
                            background: #444;
                            color: #fff;
                            border: 1px solid #555;
                            border-radius: 8px;
                            appearance: none;
                            transition: all 0.3s ease;
                        ">
                            <option value="">Pilih Jenis Laporan</option>
                            <option value="daily">Harian</option>
                            <option value="monthly">Bulanan</option>
                            <option value="yearly">Tahunan</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="
                            color: #e0e0e0;
                            display: block;
                            margin-bottom: 5px;
                            font-weight: 500;
                        ">
                            Tanggal
                        </label>
                        <input type="date" id="filterDate" style="
                            width: 100%;
                            padding: 10px;
                            background: #444;
                            color: #fff;
                            border: 1px solid #555;
                            border-radius: 8px;
                            transition: all 0.3s ease;
                        ">
                    </div>
                </div>
            </div>

            <!-- Statistik Cards -->
            <div style="flex: 1; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                <!-- Total Penjualan -->
                <div style="
                    background: linear-gradient(145deg, #ffc107 0%, #ff9800 100%);
                    border-radius: 12px;
                    padding: 20px;
                    color: #212529;
                    box-shadow: 0 8px 25px rgba(255,152,0,0.2);
                    transition: transform 0.3s ease;
                ">
                    <h6 style="font-weight: 600; margin-bottom: 10px; opacity: 0.9;">Total Penjualan</h6>
                    <h3 id="totalSales" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px;">Rp 0</h3>
                    <small id="salesComparison" style="opacity: 0.7;"></small>
                </div>

                <!-- Jumlah Transaksi -->
                <div style="
                    background: linear-gradient(145deg, #17a2b8 0%, #007bff 100%);
                    border-radius: 12px;
                    padding: 20px;
                    color: #ffffff;
                    box-shadow: 0 8px 25px rgba(23,162,184,0.2);
                    transition: transform 0.3s ease;
                ">
                    <h6 style="font-weight: 600; margin-bottom: 10px; opacity: 0.9;">Jumlah Transaksi</h6>
                    <h3 id="totalTransactions" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px;">0</h3>
                    <small id="transactionsComparison" style="opacity: 0.7;"></small>
                </div>

                <!-- Rata-rata Per Transaksi -->
                <div style="
                    background: linear-gradient(145deg, #28a745 0%, #2ecc71 100%);
                    border-radius: 12px;
                    padding: 20px;
                    color: #ffffff;
                    box-shadow: 0 8px 25px rgba(40,167,69,0.2);
                    transition: transform 0.3s ease;
                ">
                    <h6 style="font-weight: 600; margin-bottom: 10px; opacity: 0.9;">Rata-rata Transaksi</h6>
                    <h3 id="averageTransaction" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px;">Rp 0</h3>
                    <small id="averageComparison" style="opacity: 0.7;"></small>
                </div>

                <!-- Total Cash -->
                <div style="
                    background: linear-gradient(145deg, #dc3545 0%, #f44336 100%);
                    border-radius: 12px;
                    padding: 20px;
                    color: #ffffff;
                    box-shadow: 0 8px 25px rgba(220,53,69,0.2);
                    transition: transform 0.3s ease;
                ">
                    <h6 style="font-weight: 600; margin-bottom: 10px; opacity: 0.9;">Total Cash</h6>
                    <h3 id="totalCash" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px;">Rp 0</h3>
                    <small id="cashComparison" style="opacity: 0.7;"></small>
                </div>
            </div>
        </div>

        <!-- Tabel dan Grafik -->
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <!-- Tabel Transaksi -->
<div style="
    background: linear-gradient(145deg, #383838 0%, #2a2a2a 100%);
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
">
    <!-- Header -->
    <div style="
        background: #F3881C;
        color: #ffffff;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 8px 8px 0 0; /* Sudut atas dibulatkan, sudut bawah tidak */
    ">
        <h5 style="font-weight: 700; margin: 0;">Daftar Transaksi</h5>
        <div style="display: flex; gap: 8px;">
            <button id="exportExcel" style="
                background: #28a745;
                color: white;
                border: none;
                font-size: 15px;
                padding: 8px 12px;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s ease;
                cursor: pointer;
            "><i class="fas fa-file-excel"></i> Export Excel</button>
            <button id="exportPDF" style="
                background: #dc3545;
                color: white;
                border: none;
                padding: 8px 12px;
                    font-size: 15px;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s ease;
                cursor: pointer;
            "><i class="fas fa-file-pdf"></i> Export PDF</button>
        </div>
    </div>

    <!-- Tabel -->
    <div style="padding: 0;"> <!-- Padding dihapus agar tabel menyatu dengan header -->
        <table id="salesTable" style="
            width: 100%;
            border: 2px solid linear-gradient(145deg, #17a2b8 0%, #007bff 100%);;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 0 0 12px 12px; /* Sudut bawah dibulatkan */
        ">
            <thead>
                <tr style="background-color: #ff6b6b; color: #ffffff;">
                    <th style="border: 1px solid #ddd; padding: 10px; font-weight: 600;">Tanggal</th>
                    <th style="border: 1px solid #ddd; padding: 10px; font-weight: 600;">Invoice</th>
                    <th style="border: 1px solid #ddd; padding: 10px; font-weight: 600;">Total</th>
                    <th style="border: 1px solid #ddd; padding: 10px; font-weight: 600;">Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" style="
                        text-align: center;
                        padding: 20px;
                        color: #888;
                    ">
                        Silahkan pilih jenis laporan terlebih dahulu
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

            <!-- Grafik Penjualan -->
            <div style="width: 100%; margin-top: 15px;">
                <div style="
                    background: linear-gradient(160deg, #2c2c2c 0%, #1f1f1f 100%);
                    border-radius: 16px;
                    padding: 15px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
                 
                ">
                    <h5 style="color: #ffffff; font-weight: 700; margin-bottom: 15px;">Grafik Penjualan</h5>
                    <div style="border: 1px solid #ddd; padding: 10px; border-radius: 8px;">
                        <canvas id="salesChart" style="width: 100%; height: 250px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .material-item {
        padding: 10px;
        border-radius: 8px;
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .material-item:hover {
        background-color: #e9ecef;
        transform: translateX(5px);
    }

    .material-name {
        font-weight: 500;
        color: #495057;
    }

    .material-usage {
        font-size: 0.85rem;
    }

    .progress {
        border-radius: 10px;
        background-color: #e9ecef;
    }

    .materials-list::-webkit-scrollbar {
        width: 6px;
    }

    .materials-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .materials-list::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .materials-list::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let salesChart;

    $(document).ready(function() {
        // Set default date to today
        const today = new Date().toISOString().split('T')[0];
        $('#filterDate').val(today);
        
        // Set default filter type
        $('#filterType').val('daily');

        // Trigger initial data load
        fetchSalesReport();

        initializeChart();
        
        $('#generateReport, #filterType, #filterDate').on('change click', function() {
            if ($('#filterType').val()) {
                fetchSalesReport();
            } else {
                resetDashboard();
            }
        });

        $('#exportExcel').click(function() {
            const filterType = $('#filterType').val();
            const filterDate = $('#filterDate').val();

            if (!filterType || !filterDate) {
                alert('Silakan pilih jenis laporan dan tanggal terlebih dahulu');
                return;
            }

            // Tampilkan loading indicator
            const exportButton = document.getElementById('exportExcel');
            exportButton.disabled = true;
            exportButton.innerHTML = 'Membuat Excel...';

            // Redirect ke endpoint dengan query parameters
            window.open(`<?= site_url('kasir/export_report_excel') ?>?type=${filterType}&date=${filterDate}`, '_blank');

            // Reset tombol setelah beberapa detik
            setTimeout(() => {
                exportButton.disabled = false;
                exportButton.innerHTML = 'Export Excel';
            }, 2000);
        });

        $('#exportPDF').click(function() {
            const filterType = $('#filterType').val();
            const filterDate = $('#filterDate').val();

            if (!filterType || !filterDate) {
                alert('Silakan pilih jenis laporan dan tanggal terlebih dahulu');
                return;
            }

            // Tampilkan loading indicator
            const exportButton = document.getElementById('exportPDF');
            exportButton.disabled = true;
            exportButton.innerHTML = 'Membuat PDF...';

            // Redirect ke endpoint dengan query parameters
            window.open(`<?= site_url('kasir/export_report_pdf') ?>?type=${filterType}&date=${filterDate}`, '_blank');

            // Reset tombol setelah beberapa detik
            setTimeout(() => {
                exportButton.disabled = false;
                exportButton.innerHTML = 'Export PDF';
            }, 2000);
        });
    });

    function resetDashboard() {
        $('#totalSales').text('Rp 0');
        $('#totalTransactions').text('0');
        $('#averageTransaction').text('Rp 0');
        $('#totalCash').text('Rp 0');
        $('#salesTable tbody').html('<tr><td colspan="4" class="text-center">Silahkan pilih jenis laporan terlebih dahulu</td></tr>');
        updateChart([]);
    }
    function initializeChart() {
    const ctx = document.getElementById('salesChart').getContext('2d');
    salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [], // Label sumbu X (misalnya tanggal)
            datasets: [{
                data: [], // Data penjualan
                label: 'Penjualan',
                borderColor: '#ffc107', // Warna garis grafik
                tension: 0.1 // Tingkat kelengkungan garis
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: 'white' // Warna teks legenda
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: 'white' // Warna teks sumbu X
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)' // Warna grid sumbu X
                    }
                },
                y: {
                    ticks: {
                        color: 'white' // Warna teks sumbu Y
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)' // Warna grid sumbu Y
                    }
                }
            }
        }
    });
}

    function updateChart(data) {
        const labels = data.map(item => formatDate(item.order_date));
        const values = data.map(item => parseFloat(item.total_price));

        salesChart.data.labels = labels;
        salesChart.data.datasets[0].data = values;
        salesChart.update();
    }

    function fetchSalesReport() {
        const filterType = $('#filterType').val();
        const filterDate = $('#filterDate').val();

        if (!filterType) return;

        showLoading();

        $.ajax({
            url: "<?php echo site_url('dashboard/get_sales_report'); ?>",
            method: "GET",
            data: { 
                type: filterType, 
                date: filterDate 
            },
            success: function(response) {
                try {
                    const data = JSON.parse(response);
                    if (data && data.length > 0) {
                        updateDashboard(data);
                        updateTable(data);
                        updateChart(data);
                    } else {
                        showNoData();
                    }
                } catch (e) {
                    console.error('Error parsing response:', e);
                    showError('Terjadi kesalahan saat memuat data');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                showError('Terjadi kesalahan saat memuat data');
            }
        });
    }

    function updateDashboard(data) {
        let totalSales = 0;
        let totalCash = 0;
        const transactions = data.length;

        data.forEach(item => {
            const amount = parseFloat(item.total_price);
            totalSales += amount;
            if (item.payment_method?.toLowerCase() === 'cash') {
                totalCash += amount;
            }
        });

        const averageTransaction = transactions > 0 ? totalSales / transactions : 0;

        $('#totalSales').text(`Rp ${formatNumber(totalSales)}`);
        $('#totalTransactions').text(transactions);
        $('#averageTransaction').text(`Rp ${formatNumber(averageTransaction)}`);
        $('#totalCash').text(`Rp ${formatNumber(totalCash)}`);
    }

    function updateTable(data) {
        let html = '';
        data.forEach(item => {
            html += `
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="border: 1px solid #ddd; padding: 12px;">${formatDate(item.order_date)}</td>
                    <td style="border: 1px solid #ddd; padding: 12px;">${item.id_order}</td>
                    <td style="border: 1px solid #ddd; padding: 12px;">Rp ${formatNumber(item.total_price)}</td>
                    <td style="border: 1px solid #ddd; padding: 12px;">${item.payment_method || '-'}</td>
                </tr>
            `;
        });
        $('#salesTable tbody').html(html);
    }

    function showLoading() {
        $('#salesTable tbody').html(`
            <tr>
                <td colspan="4" class="text-center">
                    <div class="d-flex justify-content-center align-items-center py-3">
                        <div class="spinner-border text-warning me-2" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span>Memuat data...</span>
                    </div>
                </td>
            </tr>
        `);
    }

    function showNoData() {
        $('#salesTable tbody').html(`
            <tr>
                <td colspan="4" class="text-center">
                    <div class="alert alert-info mb-0" role="alert">
                        <i class="bi bi-info-circle me-2"></i>
                        Tidak ada data untuk periode yang dipilih
                    </div>
                </td>
            </tr>
        `);
        resetDashboard();
    }

    function showError(message) {
        $('#salesTable tbody').html(`
            <tr>
                <td colspan="4" class="text-center">
                    <div class="alert alert-danger mb-0" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        ${message}
                    </div>
                </td>
            </tr>
        `);
        resetDashboard();
    }

    function formatNumber(number) {
        return parseFloat(number).toLocaleString('id-ID');
    }

    function formatDate(dateString) {
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        return new Date(dateString).toLocaleDateString('id-ID', options);
    }
</script>