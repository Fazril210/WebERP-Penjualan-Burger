<div class="content" style="background-color: #000; margin-bottom: 50px;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left: 20px; margin-top: 50px;">
        <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Daftar Transaksi</h1>

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Tombol Tambah Item -->
        <a href="<?php echo site_url('dashboard/add_transaksi'); ?>" class="btn btn-primary mb-4">Tambah Transaksi</a>

    <!-- Form Pencarian -->
    <form id="searchForm" class="mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <div style="flex: 1; margin-right: 20px;">
        <input type="text" class="form-control" id="searchInputTransaction" placeholder="Masukkan nama produk atau nama pemasok" onkeyup="searchTransaction()" 
            style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; width: 100%; box-sizing: border-box;">
    </div>
    <div style=" text-align: left;">
        <button type="button" class="btn btn-success" onclick="printAllDataTransaction()" 
            style="background-color: orange; color: white; padding: 10px 20px; border-radius: 5px; border: none; font-size: 16px; cursor: pointer;"> 
            <i class="fas fa-print"></i> Cetak Semua Data
        </button>
    </div>
    </form>
   
    
      <!-- Advanced Filter Section -->
<div style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); max-width: 1200px; margin: auto;">
    <h3 style="font-size: 20px; font-weight: bold; text-align: center; color: black;">Filter Data</h3>
    <div style="width: 100%; height: 2px; background-color: #000; margin-bottom: 20px;"></div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
        <!-- Total Harga Filter -->
        <div style="display: flex; flex-direction: column;">
            <label for="totalPriceFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Total Harga</label>
            <select id="totalPriceFilter" onchange="applyFilters()" 
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
                <option value="highest">Tertinggi</option>
                <option value="lowest">Terendah</option>
            </select>
        </div>

        <!-- Harga Satuan Filter -->
        <div style="display: flex; flex-direction: column;">
            <label for="unitPriceFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Harga Satuan</label>
            <select id="unitPriceFilter" onchange="applyFilters()" 
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
                <option value="highest">Tertinggi</option>
                <option value="lowest">Terendah</option>
            </select>
        </div>

        <!-- Jumlah Beli Filter -->
        <div style="display: flex; flex-direction: column;">
            <label for="quantityFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Jumlah Beli</label>
            <select id="quantityFilter" onchange="applyFilters()" 
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
                <option value="highest">Tertinggi</option>
                <option value="lowest">Terendah</option>
            </select>
        </div>

        <!-- Metode Pembayaran Filter -->
        <div style="display: flex; flex-direction: column;">
            <label for="paymentMethodFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Metode Pembayaran</label>
            <select id="paymentMethodFilter" onchange="applyFilters()" 
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
                <option value="Transfer">Transfer</option>
                <option value="Cash">Cash</option>
                <option value="E-Wallet">E-Wallet</option>
            </select>
        </div>

        <!-- Status Pembayaran Filter -->
        <div style="display: flex; flex-direction: column;">
            <label for="paymentStatusFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Status Pembayaran</label>
            <select id="paymentStatusFilter" onchange="applyFilters()" 
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
                <option value="Lunas">Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
            </select>
        </div>

        <!-- Tanggal Dari -->
        <div style="display: flex; flex-direction: column;">
            <label for="startDate" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Tanggal Dari</label>
            <input type="date" id="startDate" onchange="applyFilters()" 
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
        </div>

        <!-- Tanggal Hingga -->
        <div style="display: flex; flex-direction: column;">
            <label for="endDate" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Tanggal Hingga</label>
            <input type="date" id="endDate" onchange="applyFilters()" 
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
        </div>
    </div>

    <!-- Reset and Search Buttons -->
    <div style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 15px;">
        <button onclick="resetFilters()" 
            style="background-color: #6c757d; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer; transition: background-color 0.3s;">
            <i class="fas fa-undo"></i> Reset Filter Tanggal
        </button>
    </div>
</div>




    <!-- Tabel Transaksi dengan Bootstrap -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="transactionTable">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align: center;">ID Transaksi</th>
                    <th style="text-align: center;">Nama Produk</th>
                    <th style="text-align: center;">Nama Pemasok</th>
                    <th style="text-align: center;">Jumlah Beli</th>
                    <th style="text-align: center;">Harga Satuan</th>
                    <th style="text-align: center;">Total Harga</th>
                    <th style="text-align: center;">Metode Pembayaran</th>
                    <th style="text-align: center;">Status Pembayaran</th>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: center;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($transactions)): ?>
                    <?php foreach ($transactions as $transaction): ?>
                        <tr id="row_transaction<?php echo $transaction->id_transaksi; ?>" class="transaction-row"  data-supplier-id="<?php echo isset($transaction->id_suppliers) ? $transaction->id_suppliers : ''; ?>"  data-product-id="<?php echo isset($transaction->id_produk) ? $transaction->id_produk : ''; ?>" >
                            <td style="text-align: center;"><?php echo $transaction->id_transaksi; ?></td>
                            <td style="text-align: center;"><?php echo $transaction->name_product; ?></td>
                            <td style="text-align: center;"><?php echo $transaction->name_suppliers; ?></td>
                            <td style="text-align: center;"><?php echo $transaction->jumlah_beli; ?></td>
                            <td style="text-align: center;"><?php echo 'Rp. ' . number_format($transaction->harga_satuan, 0, ',', '.'); ?></td>
                            <td style="text-align: center;"><?php echo 'Rp. ' . number_format($transaction->total_harga, 0, ',', '.'); ?></td>
                            <td style="text-align: center;"><?php echo $transaction->metode_pembayaran; ?></td>
                            <td style="text-align: center;">
    <span style="background-color: <?php echo ($transaction->status_pembayaran == 'Lunas') ? '#5CB338' : 'red'; ?>; padding: 10px; font-size:14px; border-radius: 10px;">
        <?php echo $transaction->status_pembayaran; ?>
    </span>
</td>

                            <td style="text-align: center;"><?php echo $transaction->tgl; ?></td>
                            <!-- Replace the existing action column HTML with this improved version -->
<td style="text-align: center; padding: 10px;">
    <div class="btn-group" role="group" style="display: flex; gap: 5px; justify-content: center;">


        <!-- Delete Button -->
        <button type="button"
                class="btn btn-sm" 
                onclick="deleteTransaction(<?php echo $transaction->id_transaksi; ?>)" 
                style="background-color: #ff0000;
                       color: white;
                       border: none;
                       padding: 8px 12px;
                       border-radius: 4px;
                       transition: all 0.3s ease;
                       display: inline-flex;
                       align-items: center;
                       gap: 5px;">
            <i class="fas fa-trash-alt"></i>
            <span>Hapus</span>
        </button>

        <!-- Print Button -->
        <button type="button"
                class="btn btn-sm" 
                onclick="printRowDataTransaction(<?php echo $transaction->id_transaksi; ?>)" 
                style="background-color: #3498db;;
                       color: white;
                       border: none;
                       padding: 8px 12px;
                       border-radius: 4px;
                       transition: all 0.3s ease;
                       display: inline-flex;
                       align-items: center;
                       gap: 5px;">
            <i class="fas fa-print"></i>
            <span>Cetak</span>
        </button>
    </div>
</td>

<!-- Add this CSS to your existing styles -->
<style>
.btn-group .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.btn-group .btn:active {
    transform: translateY(0);
}

.table .btn-group {
    opacity: 0.9;
    transition: opacity 0.3s ease;
}

.table tr:hover .btn-group {
    opacity: 1;
}

@media (max-width: 768px) {
    .btn-group {
        flex-direction: column;
    }
    
    .btn-group .btn {
        width: 100%;
        margin: 2px 0;
    }
}
</style>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data transaksi</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Edit Transaksi -->
<div class="modal fade" id="editTransactionModal" tabindex="-1" role="dialog" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: white; border-bottom: none; border-radius: 10px;">
                <h5 class="modal-title" id="editTransactionModalLabel"><i class="fas fa-edit"></i> Edit Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <form id="editTransactionForm" action="<?php echo site_url('dashboard/do_edit_transaction'); ?>" method="POST">
                    <input type="hidden" name="transaksi_id" id="transaksi_id">
                    
                    <div class="form-group">
                    <label for="name_products">Nama Produk</label>
        <select id="id_produk" name="id_produk" class="form-control" required>
            <option value="" disabled selected>Pilih Produk</option>
            <?php foreach ($products as $product): ?>
                <option value="<?php echo $product->id_produk; ?>">
                    <?php echo $product->name_product; ?>
                </option>
            <?php endforeach; ?>
        </select>
                    </div>
                    
                    <div class="form-group">
                    <label for="suppliers">Nama Pemasok</label>
        <select id="id_suppliers" name="id_suppliers" class="form-control" required >
            <option value="" disabled selected>Pilih Pemasok</option>
            <?php foreach ($suppliers as $supplier): ?>
                <option value="<?php echo $supplier->id_suppliers; ?>">
                    <?php echo $supplier->name_suppliers; ?>
                </option>
            <?php endforeach; ?>
        </select>
                    </div>

                    <div class="form-group">
                    <label for="jumlah_beli" >Jumlah Beli</label>
        <input type="number" id="jumlah_beli" name="jumlah_beli" class="form-control" required placeholder="Masukkan jumlah pembelian"
           >
                    </div>

                    <div class="form-group" >
        <label for="harga_satuan" style="font-size: 16px; color: #555;">Harga Satuan</label>
        <input type="number" id="harga_satuan" name="harga_satuan" class="form-control" required placeholder="Masukkan harga satuan"
            >
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="total_harga" style="font-size: 16px; color: #555;">Total Harga</label>
        <input type="number" id="total_harga" name="total_harga" class="form-control" required placeholder="Masukkan total harga"
            >
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="metode_pembayaran" style="font-size: 16px; color: #555;">Metode Pembayaran</label>
        <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required
            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; box-sizing: border-box;">
            <option value="" disabled selected>Pilih Metode Pembayaran</option>
            <option value="Transfer">Transfer</option>
            <option value="Cash">Cash</option>
            <option value="E-Wallet">E-Wallet</option>
        </select>
    </div>

    <div class="form-group">
        <label for="status_pembayaran" style="font-size: 16px; color: #555;">Status Pembayaran</label>
        <select id="status_pembayaran" name="status_pembayaran" class="form-control" required
           >
            <option value="" disabled selected>Pilih Status Pembayaran</option>
            <option value="Lunas">Lunas</option>
            <option value="Belum Lunas">Belum Lunas</option>
        </select>
    </div>

    <div class="form-group" >
        <label for="tgl">Tanggal</label>
        <input type="date" id="tgl" name="tgl" class="form-control" required placeholder="Masukkan tanggal pembelian">
    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Transaksi -->
<div class="modal fade" id="deleteTransactionModal" tabindex="-1" role="dialog" aria-labelledby="deleteTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ddd; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="modal-header" style="background-color: #f8d7da; border-bottom: none; color: #721c24; font-weight: bold; border-radius: 10px;">
                <h5 class="modal-title" id="deleteTransactionModalLabel"><i class="fas fa-trash-alt"></i> Hapus Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px; font-size: 16px; color: #333; text-align: center;">
                <p>Apakah Anda yakin ingin menghapus transaksi ini?</p>
            </div>
            <div class="modal-footer" style="display: flex; justify-content: center; padding: 20px;">
                <button type="button" class="btn btn-danger" id="confirmDeleteTransactionBtn" style="background-color: #dc3545; color: white; border-radius: 30px; font-size: 16px; padding: 10px 20px; transition: background-color 0.3s ease;">Hapus</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('editTransactionForm').addEventListener('submit', function(e) {
    let isValid = true;
    const productName = document.getElementById('product_name').value.trim();
    const customerName = document.getElementById('customer_name').value.trim();
    const transactionDate = document.getElementById('transaction_date').value.trim();

    if (!productName || !customerName || !transactionDate) {
        isValid = false;
        alert('Semua bidang harus diisi!');
    }

    if (!isValid) {
        e.preventDefault();
    }
});

function applyFilters() {
    const rows = document.querySelectorAll('.transaction-row');
    const totalPriceFilter = document.getElementById('totalPriceFilter').value;
    const unitPriceFilter = document.getElementById('unitPriceFilter').value;
    const quantityFilter = document.getElementById('quantityFilter').value;
    const paymentMethodFilter = document.getElementById('paymentMethodFilter').value;
    const paymentStatusFilter = document.getElementById('paymentStatusFilter').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    // Convert rows to array for sorting
    let rowsArray = Array.from(rows);

    // Apply sorting based on filters
    if (totalPriceFilter) {
        rowsArray.sort((a, b) => {
            const priceA = parseCurrency(a.querySelector('td:nth-child(6)').textContent);
            const priceB = parseCurrency(b.querySelector('td:nth-child(6)').textContent);
            return totalPriceFilter === 'highest' ? priceB - priceA : priceA - priceB;
        });
    }

    if (unitPriceFilter) {
        rowsArray.sort((a, b) => {
            const priceA = parseCurrency(a.querySelector('td:nth-child(5)').textContent);
            const priceB = parseCurrency(b.querySelector('td:nth-child(5)').textContent);
            return unitPriceFilter === 'highest' ? priceB - priceA : priceA - priceB;
        });
    }

    if (quantityFilter) {
        rowsArray.sort((a, b) => {
            const qtyA = parseInt(a.querySelector('td:nth-child(4)').textContent);
            const qtyB = parseInt(b.querySelector('td:nth-child(4)').textContent);
            return quantityFilter === 'highest' ? qtyB - qtyA : qtyA - qtyB;
        });
    }

    // Filter rows based on payment method and status
    rowsArray.forEach(row => {
        const method = row.querySelector('td:nth-child(7)').textContent;
        const status = row.querySelector('td:nth-child(8)').textContent.trim();
        const date = row.querySelector('td:nth-child(9)').textContent;

        let show = true;

        if (paymentMethodFilter && method !== paymentMethodFilter) show = false;
        if (paymentStatusFilter && status !== paymentStatusFilter) show = false;
        if (startDate && date < startDate) show = false;
        if (endDate && date > endDate) show = false;

        row.style.display = show ? '' : 'none';
    });

    // Reorder table rows
    const tbody = document.querySelector('#transactionTable tbody');
    rowsArray.forEach(row => tbody.appendChild(row));
}

function resetFilters() {
    document.getElementById('totalPriceFilter').value = '';
    document.getElementById('unitPriceFilter').value = '';
    document.getElementById('quantityFilter').value = '';
    document.getElementById('paymentMethodFilter').value = '';
    document.getElementById('paymentStatusFilter').value = '';
    document.getElementById('startDate').value = '';
    document.getElementById('endDate').value = '';
    
    const rows = document.querySelectorAll('.transaction-row');
    rows.forEach(row => row.style.display = '');
}

function parseCurrency(value) {
    return parseInt(value.replace(/\D/g, ''));
}

// Add these styles
document.head.insertAdjacentHTML('beforeend', `
    <style>
        .filter-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 0.375rem 0.75rem;
            width: 100%;
        }
    </style>
`);

</script>

</div>