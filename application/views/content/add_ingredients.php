<div class="content" style="padding: 70px; background: linear-gradient(135deg, #f39c12, #d35400); border-radius: 8px; color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
    <h1 style="font-size: 24px; color: #333; margin-bottom: 20px;">Tambah Bahan Baku untuk Menu</h1>

    <form id="ingredientsForm" action="<?php echo site_url('ingredients/do_add_batch'); ?>" method="POST" style="background-color: #1c1c1c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <!-- Pilih Menu -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="id_items" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Pilih Menu</label>
            <select id="id_items" name="id_items" class="form-control" required
                   style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                <option value="" disabled selected>Pilih Menu</option>
                <?php foreach ($items as $item): ?>
                    <option value="<?= $item->id_items; ?>"><?= $item->name_items; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Bahan Baku -->
        <div id="bahanContainer">
            <div class="bahan-row form-group" style="margin-bottom: 15px;">
                <div class="row">
                    <div class="col-md-5">
                        <label for="id_produk" style="font-size: 16px; color: #f9f9f9; font-weight: bold;">Pilih Bahan Baku</label>
                        <select name="bahan[0][id_produk]" class="form-control" required
                               style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                            <option value="" disabled selected>Pilih Bahan Baku</option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?= $product->id_produk; ?>"><?= $product->name_product; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="quantity" style="font-size: 16px; color: #f9f9f9; font-weight: bold;">Jumlah</label>
                        <input type="number" name="bahan[0][quantity]" class="form-control" required step="0.01"
                              style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-row" style="margin-top: 28px;">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah Baris -->
        <button type="button" id="addRow" class="btn btn-success btn-sm" style="margin-bottom: 15px;">Tambah Bahan Baku</button>

        <!-- Tombol Simpan & Batal -->
        <div style="display: flex; gap: 15px; justify-content: flex-end; width: 100%; align-items: center;">
            <button type="submit" class="btn btn-primary"
            style="background-color: #007bff; color: #fff; border: none; padding: 12px 25px; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);">
                Simpan
            </button>
            <a href="<?php echo site_url('ingredients'); ?>" class="btn btn-secondary"
            style="background-color: #ff4d4d; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-size: 16px; text-align: center; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(255, 77, 77, 0.3);">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    let rowIndex = 1; // Mengelola indeks baris bahan baku

    // Tambah baris bahan baku baru
    $('#addRow').click(function () {
        const row = `
            <div class="bahan-row form-group" style="margin-bottom: 15px;">
                <div class="row">
                    <div class="col-md-5">
                     <label for="id_produk" style="font-size: 16px; color: #f9f9f9; font-weight: bold;">Pilih Bahan Baku</label>
                        <select name="bahan[${rowIndex}][id_produk]" class="form-control" required
                               style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                            <option value="" disabled selected>Pilih Bahan Baku</option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?= $product->id_produk; ?>"><?= $product->name_product; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                    <label for="quantity" style="font-size: 16px; color: #f9f9f9; font-weight: bold;">Jumlah</label>
                        <input type="number" name="bahan[${rowIndex}][quantity]" class="form-control" required step="0.01"
                              style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-row" style="margin-top: 28px;">Hapus</button>
                    </div>
                </div>
            </div>`;
        $('#bahanContainer').append(row);
        rowIndex++;
    });

    // Hapus baris bahan baku
    $(document).on('click', '.remove-row', function () {
        $(this).closest('.bahan-row').remove();
    });
</script>
