<div class="content"  style="padding: 70px; background: linear-gradient(135deg, #f39c12, #d35400); border-radius: 8px; color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
    <h1 style="font-size: 28px; color: #fff; margin-bottom: 25px; text-align: center; font-weight: bold;">Tambah Transaksi</h1>

    <form action="<?php echo site_url('dashboard/do_add_transaksi'); ?>" method="POST" style="background-color: #1c1c1c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="name_products"  style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Nama Produk</label>
        <select id="id_produk" name="id_produk" class="form-control" required style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
            <option value="" disabled selected>Pilih Produk</option>
            <?php foreach ($products as $product): ?>
                <option value="<?php echo $product->id_produk; ?>">
                    <?php echo $product->name_product; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label for="suppliers"  style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Nama Pemasok</label>
        <select id="id_suppliers" name="id_suppliers" class="form-control" required style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);" readonly>
            <option value="" disabled selected>Pilih Pemasok</option>
            <?php foreach ($suppliers as $supplier): ?>
                <option value="<?php echo $supplier->id_suppliers; ?>">
                    <?php echo $supplier->name_suppliers; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="jumlah_beli"  style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Jumlah Beli</label>
        <input type="number" id="jumlah_beli" name="jumlah_beli" class="form-control" required placeholder="Masukkan jumlah pembelian" step="0.01"
            style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="harga_satuan"  style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Harga Satuan</label>
        <input type="number" id="harga_satuan" name="harga_satuan" class="form-control" required placeholder="Masukkan harga satuan"
            style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);" readonly>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="total_harga"  style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Total Harga</label>
        <input type="number" id="total_harga" name="total_harga" class="form-control" required placeholder="Masukkan total harga"
            style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);" readonly>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="metode_pembayaran"  style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Metode Pembayaran</label>
        <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required
            style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
            <option value="" disabled selected>Pilih Metode Pembayaran</option>
            <option value="Transfer">Transfer</option>
            <option value="Cash">Cash</option>
            <option value="E-Wallet">E-Wallet</option>
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="status_pembayaran"  style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Status Pembayaran</label>
        <select id="status_pembayaran" name="status_pembayaran" class="form-control" required
            style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
            <option value="" disabled selected>Pilih Status Pembayaran</option>
            <option value="Lunas">Lunas</option>
            <option value="Belum Lunas">Belum Lunas</option>
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="tgl"  style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Tanggal</label>
        <input type="date" id="tgl" name="tgl" class="form-control" required placeholder="Masukkan tanggal pembelian"
            style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
    </div>

    <div style="display: flex; gap: 10px; justify-content: flex-end; width: 100%; align-items: center;">
        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; padding: 12px 25px; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);">
            Simpan
        </button>
        <a href="<?php echo site_url('dashboard/transactions'); ?>" class="btn btn-secondary"style="background-color: #ff4d4d; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-size: 16px; text-align: center; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(255, 77, 77, 0.3);">
            Batal
        </a>
    </div>

    </form>
</div>

<script>
    // Fungsi untuk menghitung total harga
    function calculateTotal() {
        const jumlahBeli = document.getElementById('jumlah_beli').value;
        const hargaSatuan = document.getElementById('harga_satuan').value;
        const totalHarga = document.getElementById('total_harga');
        
        // Menghitung total harga dan menampilkannya
        if (jumlahBeli && hargaSatuan) {
            totalHarga.value = jumlahBeli * hargaSatuan;
        } else {
            totalHarga.value = 0;
        }
    }

    // Menambahkan event listener pada input jumlah beli dan harga satuan
    document.getElementById('jumlah_beli').addEventListener('input', calculateTotal);
    document.getElementById('harga_satuan').addEventListener('input', calculateTotal);


    document.getElementById('id_produk').addEventListener('change', function () {
    const idProduk = this.value;

    if (idProduk) {
        fetch('<?php echo site_url("dashboard/get_product_details"); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id_produk=${idProduk}`,
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.error) {
                alert(data.error);
            } else {
                document.getElementById('id_suppliers').value = data.id_suppliers;
                document.getElementById('harga_satuan').value = data.price_per_piece;
            }
        })
        .catch((error) => console.error('Error:', error));
    }
});


</script>
