<div class="content" style="padding: 70px; background: linear-gradient(135deg, #f39c12, #d35400); border-radius: 8px; color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
    <h1 style="font-size: 28px; color: #fff; margin-bottom: 25px; text-align: center; font-weight: bold;">Tambah Supplier</h1>

    <form action="<?php echo site_url('dashboard/do_add_supplier'); ?>" method="POST" style="background-color: #1c1c1c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="name_suppliers" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Nama</label>
            <input type="text" id="name_suppliers" name="name_suppliers" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="phone" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Telepon</label>
            <input type="text" id="phone" name="phone" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="alamat" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);" rows="4"></textarea>
        </div>

        <div style="display: flex; gap: 15px; justify-content: flex-end; width: 100%; align-items: center;">
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; padding: 12px 25px; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);">
                Simpan
            </button>
            <a href="<?php echo site_url('dashboard/suppliers'); ?>" class="btn btn-secondary" style="background-color: #ff4d4d; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-size: 16px; text-align: center; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(255, 77, 77, 0.3);">
                Batal
            </a>
        </div>
    </form>
</div>
