

    <div class="content" style="background-color: #000; margin-bottom: 50px; transition: margin-left 0.3s ease;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left:20px; margin-top: 50px; ">
    <div class="dashboard-header" style="background: linear-gradient(135deg, #f39c12, #d35400); padding: 25px; border-radius: 15px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
        <h1 style="color: #fff; font-size: 28px; margin: 0; font-family: 'Poppins', sans-serif; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
            Dashboard Admin
        </h1>
        <p style="color: #fff; font-size: 20px; font-weight: 500; margin: 10px 0 5px; font-family: 'Roboto', sans-serif;">
            Selamat datang, <b><?php echo $this->session->userdata('username'); ?></b>
        </p>
        <p id="currentTime" style="color: #fff; font-size: 16px; margin: 0; font-style: italic; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">
            <!-- Jam akan diupdate dengan JavaScript -->
        </p>
    </div>


  <!-- Card untuk Anggota dengan Transaksi Terbanyak dan Total Final Price -->
  <div class="card" style="margin-top: 30px; padding: 20px; border-radius: 15px; background: linear-gradient(135deg, #1f618d, #2980b9); color: white; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);">
    <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; text-align: center; font-family: 'Poppins', sans-serif;">
        5 Member dengan Total Transaksi Tertinggi
    </h3>
    <div class="top-products" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        <?php foreach ($members_and_non_members['members'] as $member): ?>
        <div class="product-card" style="flex: 1; max-width: 220px; background-color: #000; padding: 15px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <!-- Member Icon -->
            <div style="width: 80px; height: 80px; background-color: #2c3e50; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-user" style="font-size: 40px; color: #3498db;"></i>
            </div>
            
            <!-- Member Info -->
            <h4 style="color: white; font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                <?= $member->member_name ?>
            </h4>
            <p style="color: #bdc3c7; font-size: 14px; margin-bottom: 5px;">
                <?= $member->email ?>
            </p>
            <p style="color: #bdc3c7; font-size: 14px; margin-bottom: 15px;">
                <?= $member->phone ?>
            </p>
            
            <!-- Transaction Details -->
            <div style="padding-top: 10px; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                <p style="font-size: 18px; font-weight: bold; color: #f1c40f; margin-bottom: 5px;">
                    <?= $member->transaction_count ?> Transaksi
                </p>
                <p style="font-size: 16px; font-weight: bold; color: #2ecc71; margin: 0;">
                    Rp <?= number_format($member->total_final_price, 0, ',', '.') ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Tampilan Non-Member -->
<div class="card" style="margin-top: 30px; padding: 20px; border-radius: 15px; background: linear-gradient(135deg, #1f618d, #2980b9); color: white; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);">
    <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; text-align: center; font-family: 'Poppins', sans-serif;">
        Total Transaksi Non-Member 
    </h3>
    <div class="top-products" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        <?php foreach ($members_and_non_members['non_members'] as $non_member): ?>
        <div class="product-card" style="flex: 1; max-width: 220px; background-color: #000; padding: 15px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <!-- Non-Member Icon -->
            <div style="width: 80px; height: 80px; background-color: #2c3e50; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-user" style="font-size: 40px; color: #e67e22;"></i>
            </div>
            
            <!-- Non-Member Info -->
            <h4 style="color: white; font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                <?= $non_member->member_name ?>
            </h4>
            <p style="color: #bdc3c7; font-size: 14px; margin-bottom: 5px;">
                <?= $non_member->email ?>
            </p>
            <p style="color: #bdc3c7; font-size: 14px; margin-bottom: 15px;">
                <?= $non_member->phone ?>
            </p>
            
            <!-- Transaction Details -->
            <div style="padding-top: 10px; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                <p style="font-size: 18px; font-weight: bold; color: #f1c40f; margin-bottom: 5px;">
                    <?= $non_member->transaction_count ?> Transaksi
                </p>
                <p style="font-size: 16px; font-weight: bold; color: #2ecc71; margin: 0;">
                    Rp <?= number_format($non_member->total_final_price, 0, ',', '.') ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>







         <!-- Stats Cards Grid -->
         <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 30px;">
            <!-- Products Card -->
            <a href="<?php echo site_url('dashboard/items'); ?>" style="text-decoration: none;">
                <div style="background: linear-gradient(135deg, #27ae60, #2ecc71); padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;">
                    <i class="fas fa-burger" style="font-size: 36px; color: rgba(255, 255, 255, 0.9); display: block; text-align: center; margin-bottom: 15px;"></i>
                    <h3 style="color: white; text-align: center; margin: 0 0 10px 0; font-size: 20px;">Total Produk</h3>
                    <p style="color: white; text-align: center; font-size: 24px; font-weight: bold; margin: 0;">
                        <?php echo $total_items; ?> Produk
                    </p>
                </div>
            </a>

            <!-- Members Card -->
            <a href="<?php echo site_url('dashboard/members'); ?>" style="text-decoration: none;">
                <div style="background: linear-gradient(135deg, #2980b9, #3498db); padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;">
                    <i class="fas fa-users" style="font-size: 36px; color: rgba(255, 255, 255, 0.9); display: block; text-align: center; margin-bottom: 15px;"></i>
                    <h3 style="color: white; text-align: center; margin: 0 0 10px 0; font-size: 20px;">Total Member</h3>
                    <p style="color: white; text-align: center; font-size: 24px; font-weight: bold; margin: 0;">
                        <?php echo $total_members; ?> Member
                    </p>
                </div>
            </a>

            <!-- Suppliers Card -->
            <a href="<?php echo site_url('dashboard/suppliers'); ?>" style="text-decoration: none;">
                <div style="background: linear-gradient(135deg, #8e44ad, #9b59b6); padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;">
                    <i class="fas fa-truck" style="font-size: 36px; color: rgba(255, 255, 255, 0.9); display: block; text-align: center; margin-bottom: 15px;"></i>
                    <h3 style="color: white; text-align: center; margin: 0 0 10px 0; font-size: 20px;">Total Supplier</h3>
                    <p style="color: white; text-align: center; font-size: 24px; font-weight: bold; margin: 0;">
                        <?php echo $total_suppliers; ?> Supplier
                    </p>
                </div>
            </a>
        </div>


        <!-- Card untuk Produk Terlaris -->
        <div class="card" style="margin-top: 30px; padding: 20px; border-radius: 15px; background: linear-gradient(135deg, #f39c12, #d35400); color: white; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);">
        <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; text-align: center; font-family: 'Poppins', sans-serif;">5 Produk Terlaris</h3>
        <div class="top-products" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
            <?php foreach ($top_products as $product): ?>
            <div class="product-card" style="flex: 1; max-width: 220px; background-color: #000; padding: 15px; border-radius: 12px; text-align: center; transition: transform 0.3s, box-shadow 0.3s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                <?php if (!empty($product->images)): ?>
                <img src="<?= base_url('assets/images/' . $product->images) ?>" 
                    alt="<?= $product->name_items ?>"
                    style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                <?php endif; ?>
                <h4 style="color: white; font-size: 18px; font-weight: bold; margin-bottom: 10px;"><?= $product->name_items ?></h4>
                <p style="font-size: 16px; margin-bottom: 10px;">Terjual: <?= number_format($product->total_sold) ?> pcs</p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

<!-- Card untuk Total Penggunaan Bahan Baku per Produk -->
<div class="card" style="flex: 1 100%; padding: 20px; border-radius: 15px; background: linear-gradient(135deg, #f39c12, #d35400); color: #202124; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1); margin-top: 20px; margin-top: 30px;">
    <h3 style="color: #fff; text-align: center; margin-bottom: 20px; font-size: 24px; font-weight: bold; font-family: 'Poppins', sans-serif;">Total Penggunaan Bahan Baku</h3>

    <!-- Filter Section -->
    <div style="background-color: #202124; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <h3 style="font-size: 20px; font-weight: bold; text-align: center; color: #fff; margin-bottom: 15px;">Filter Data</h3>
        <div style="width: 100%; height: 2px; background-color: #fff; margin-bottom: 20px;"></div>
        
        <!-- Filter Options -->
        <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
            <!-- Sorting Filter -->
            <div style="display: flex; flex-direction: column; align-items: center;">
                <label for="orderFilter" style="font-size: 14px; font-weight: bold; color: #fff; margin-bottom: 8px;">Urutkan Berdasarkan:</label>
                <select id="orderFilter" onchange="applyFilter()" style="padding: 8px 12px; border-radius: 8px; border: 1px solid #f39c12; background-color: #FFFFFF; font-size: 14px; width: 200px;">
                    <option value="">Pilih penggunaan bahan baku</option>
                    <option value="desc">Penggunaan Tertinggi</option>
                    <option value="asc">Penggunaan Terendah</option>
                </select>
            </div>

            <!-- Search Bar -->
            <div style="display: flex; flex-direction: column; align-items: center;">
                <label for="searchInput" style="font-size: 14px; font-weight: bold; color: #fff; margin-bottom: 8px;">Cari Produk:</label>
                <input type="text" id="searchInput" oninput="searchTable()" placeholder="Cari..." style="padding: 8px 12px; border-radius: 8px; border: 1px solid #f39c12; background-color: #FFFFFF; font-size: 14px; width: 200px;">
            </div>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table id="usageTable" class="table table-striped table-bordered" style="width: 100%; background-color: #FFFFFF; border-radius: 5px; overflow: hidden;">
            <thead style="background-color: #1A73E8; color: #FFFFFF; text-align: center;">
                <tr>
                    <th>Nama Produk</th>
                    <th>Total Penggunaan</th>
                </tr>
            </thead>
            <tbody style="text-align: center; color: #202124;">
                <?php if (!empty($total_usage_by_product)): ?>
                    <?php foreach ($total_usage_by_product as $usage): ?>
                        <tr style="transition: background-color 0.3s;">
                            <td><?php echo $usage->name_product; ?></td>
                            <td><?php echo $usage->total_usage;?> <?php  echo $usage->unit_of_goods; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Tidak ada data penggunaan bahan baku.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <button id="prevPage" style="padding: 8px 16px; border-radius: 8px; border: none; background-color: #000; color: white; cursor: pointer; margin-right: 10px; font-weight:bold;">Sebelumnya</button>
        <button id="nextPage" style="padding: 8px 16px; border-radius: 8px; border: none; background-color: #000; color: white; cursor: pointer; font-weight:bold;">Selanjutnya</button>
    </div>

    <!-- Chart Visualisasi -->
    <div style="margin-top: 30px;">
        <canvas id="usageChart" style="background-color: #FFFFFF; border-radius: 10px; padding: 20px;"></canvas>
    </div>
</div>


<!-- Card untuk Grafik Penjualan Bulanan -->
<div class="card" style="flex: 1 100%; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #000; margin-top: 30px; margin-bottom: 50px; position: relative;">
        <h3 style="color: #fff;">Grafik Penjualan Bulanan</h3>
        <div class="chart-container" style="position: relative; width: 100%; height: 300px;">
            <canvas id="monthlySalesChartDashboard"></canvas>
        </div>

        <!-- Dropdown Filter Tahun -->
        <div style="position: absolute; top: 20px; right: 20px; display: flex; align-items: center; gap: 5px;">
            <select id="yearFilter" style="padding: 8px 12px; border-radius: 8px; border: 1px solid #ddd; background: linear-gradient(135deg, #f39c12, #d35400); color: black; font-size: 14px; font-family: 'Roboto', sans-serif; transition: border-color 0.3s;">
                <!-- Isi dropdown secara dinamis -->
            </select>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctxMonthlyDashboard = document.getElementById('monthlySalesChartDashboard').getContext('2d');
                let monthlySalesChart;

                // Fungsi untuk memuat data penjualan bulanan dan menggambar grafik
                function loadMonthlySalesDashboard() {
                    const year = document.getElementById('yearFilter').value;

                    fetch(`<?= base_url('dashboard/get_monthly_sales/') ?>${year}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('Data API:', data); // Debug data API

                            // Periksa apakah data kosong
                            if (!data || data.length === 0) {
                                console.warn('Data penjualan bulanan kosong.');
                                if (monthlySalesChart) {
                                    monthlySalesChart.destroy();
                                }
                                return;
                            }

                            // Format label sumbu X
                            const monthNames = [
                                "Januari", "Februari", "Maret", "April", "Mei",
                                "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                            ];
                            const labels = data.map(item => {
                                const [year, month] = item.month.split('-');
                                return monthNames[parseInt(month, 10) - 1] + ' ' + year;
                            });

                            const totals = data.map(item => item.total); // Sumbu Y (pendapatan)

                            // Hancurkan grafik lama jika ada
                            if (monthlySalesChart) {
                                monthlySalesChart.destroy();
                            }

                            // Buat grafik baru
                            monthlySalesChart = new Chart(ctxMonthlyDashboard, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Pendapatan Bulanan',
                                        data: totals,
                                        backgroundColor:' #e67e22',
                                        borderColor: '#e67e22',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            labels: {
                                                color: 'white' // Warna teks legend
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Grafik Penjualan Bulanan'
                                        }
                                    },
                                    scales: {
                                        x: {
                                            ticks: {
                                                color: 'white', // Warna label sumbu X
                                            }
                                        },
                                        y: {
                                            ticks: {
                                                color: 'white',
                                                callback: function (value) {
                                                    return 'Rp ' + value.toLocaleString('id-ID');
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        })
                        .catch(error => {
                            console.error('Error loading monthly sales data:', error);
                            console.error('Error fetching data:', error);
                        });
                }

                // Fungsi untuk memuat tahun di dropdown filter
                function loadYearOptions() {
                    const currentYear = new Date().getFullYear();
                    const yearFilter = document.getElementById('yearFilter');

                    for (let year = currentYear; year >= currentYear - 5; year--) {
                        const option = document.createElement('option');
                        option.value = year;
                        option.textContent = year;
                        yearFilter.appendChild(option);
                    }

                    // Set default ke tahun sekarang
                    yearFilter.value = currentYear;
                    yearFilter.addEventListener('change', loadMonthlySalesDashboard);
                }

                // Panggil saat halaman dimuat
                loadYearOptions();
                loadMonthlySalesDashboard();
            });


        // Fungsi untuk memperbarui waktu saat ini setiap detik
        function updateClock() {
                const now = new Date();
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const seconds = now.getSeconds().toString().padStart(2, '0');
                document.getElementById('currentTime').innerText = `Waktu: ${hours}:${minutes}:${seconds}`;
            }

            // Memperbarui waktu setiap detik
            setInterval(updateClock, 1000);
            updateClock(); // Panggil sekali saat halaman dimuat


        
    </script>

<script>
    function applyFilter() {
        const order = document.getElementById('orderFilter').value;
        // Jika opsi default dipilih, hapus parameter order dari URL
        if (order === "") {
            window.location.href = "<?php echo site_url('dashboard'); ?>";
        } else {
            window.location.href = "<?php echo site_url('dashboard'); ?>?order=" + order;
        }
    }

    // Set nilai dropdown sesuai dengan parameter URL
    const urlParams = new URLSearchParams(window.location.search);
    const order = urlParams.get('order') || '';
    document.getElementById('orderFilter').value = order;
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Fungsi untuk mencari data di tabel
    function searchTable() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#usageTable tbody tr');
        rows.forEach(row => {
            const productName = row.cells[0].textContent.toLowerCase();
            if (productName.includes(input)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Fungsi untuk pagination
    let currentPage = 1;
    const rowsPerPage = 5;
    const rows = document.querySelectorAll('#usageTable tbody tr');

    function showPage(page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        rows.forEach((row, index) => {
            row.style.display = (index >= start && index < end) ? '' : 'none';
        });
    }

    document.getElementById('prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById('nextPage').addEventListener('click', () => {
        if (currentPage < Math.ceil(rows.length / rowsPerPage)) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);

    // Fungsi untuk menggambar grafik
    const ctx = document.getElementById('usageChart').getContext('2d');
// Data untuk grafik
const chartData = {
    labels: <?php echo json_encode(array_map(function($usage) { return $usage->name_product; }, $total_usage_by_product)); ?>,
    datasets: [{
        label: 'Total Penggunaan Bahan Baku',
        data: <?php echo json_encode(array_map(function($usage) { return $usage->total_usage; }, $total_usage_by_product)); ?>,
        backgroundColor: '#d35400',
        borderColor: '#fff',
        borderWidth: 1
    }]
};

// Data satuan (diambil dari PHP)
const units = <?php echo json_encode(array_map(function($usage) { return $usage->unit_of_goods; }, $total_usage_by_product)); ?>;

// Konfigurasi grafik
const usageChart = new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Grafik Penggunaan Bahan Baku per Produk',
                color: '#202124'
            },
            tooltip: {
                callbacks: {
                    // Custom tooltip untuk menampilkan total penggunaan dan satuan
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.raw || 0;
                        const unit = units[context.dataIndex]; // Ambil satuan berdasarkan indeks data
                        return `${label}: ${value} ${unit}`; // Gabungkan nilai dan satuan
                    }
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: '#202124'
                }
            },
            y: {
                ticks: {
                    color: '#202124'
                }
            }
        }
    }
});
</script>
  
    </div>
    </div>