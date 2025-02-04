<div class="content" style="padding: 70px; background: linear-gradient(135deg, #f39c12, #d35400); border-radius: 8px; color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
    <h1 style="font-size: 28px; color: #fff; margin-bottom: 25px; text-align: center; font-weight: bold;">Tambah Produk</h1>

    <!-- Tampilkan pesan error/sukses -->
    <?php if ($this->session->flashdata('error')): ?>
        <div style="color: red; margin-bottom: 15px;"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success')): ?>
        <div style="color: green; margin-bottom: 15px;"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <form action="<?php echo site_url('dashboard/do_add_product'); ?>" method="POST" style="background-color: #1c1c1c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name_product" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Nama Produk</label>
            <input type="text" id="name_product" name="name_product" class="form-control" required
                    style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="stock" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Stok</label>
            <input type="number" id="stock" name="stock" class="form-control" required
                    style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
    <label for="unit_of_goods" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Satuan Produk</label>
    <select id="unit_of_goods" name="unit_of_goods" class="form-control" required
         style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        <option value="" disabled selected>Pilih Satuan Produk</option>
        <option value="pcs">Pcs</option>
        <option value="kg">Kilogram (kg)</option>
        <option value="gram">Gram (g)</option>
        <option value="liter">Liter (l)</option>
        <option value="ml">Mililiter (ml)</option>
        <option value="pack">Pack</option>
    </select>
</div>


        <div class="form-group" style="margin-bottom: 15px;">
            <label for="price_per_piece" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Harga Per Buah</label>
            <input type="number" step="0.01" min="0" id="price_per_piece" name="price_per_piece" class="form-control" required
                    style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
    <label for="id_suppliers" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Supplier</label>
    <select id="id_suppliers" name="id_suppliers" class="form-control" required
             style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        <option value="" disabled selected>Pilih Supplier</option>
        <?php foreach ($suppliers as $supplier): ?>
            <option value="<?php echo $supplier->id_suppliers; ?>">
                <?php echo $supplier->name_suppliers; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


        <div style="display: flex; gap: 15px; justify-content: flex-end; width: 100%; align-items: center;">
            <button type="submit" class="btn btn-primary"
            style="background-color: #007bff; color: #fff; border: none; padding: 12px 25px; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);">
                Simpan
            </button>
            <a href="<?php echo site_url('dashboard/products'); ?>" class="btn btn-secondary"
            style="background-color: #ff4d4d; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-size: 16px; text-align: center; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(255, 77, 77, 0.3);">
                Batal
            </a>
        </div>
    </form>
</div>
