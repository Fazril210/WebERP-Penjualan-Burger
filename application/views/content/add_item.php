<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?php echo $this->session->flashdata('success'); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?php echo $this->session->flashdata('error'); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php endif; ?>
    <style>
        /* Optional: Styling for the image preview */
        #imagePreview {
            display: none;
            margin-top: 15px;
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
        }
    </style>

<div class="content" style="padding: 70px; background: linear-gradient(135deg, #f39c12, #d35400); border-radius: 8px; color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
    <h1 style="font-size: 24px; color: #333; margin-bottom: 20px;">Tambah Item</h1>

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <form action="<?php echo site_url('dashboard/do_add_item'); ?>" method="POST" enctype="multipart/form-data" style="background-color: #1c1c1c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name_items" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Nama Item</label>
            <input type="text" id="name_items" name="name_items" class="form-control" required
                  style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="price_items" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Harga</label>
            <input type="number" step="0.01" id="price_items" name="price_items" class="form-control" required
                  style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="stock_items" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Stok</label>
            <input type="number" id="stock_items" name="stock_items" class="form-control" required
                  style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="images" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Gambar</label>
            <input type="file" id="images" name="images" class="form-control-file" accept="image/*"
                   style="font-size: 16px; box-sizing: border-box;" onchange="previewImage()">
            <small class="form-text text-muted">Pilih gambar untuk melihat preview sebelum menyimpan.</small>
            <img id="imagePreview" src="#" alt="Preview Gambar" />
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="status" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Status</label>
            <select id="status" name="status" class="form-control" required
                   style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                <option value="" disabled>Silahkan Pilih Status</option>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="type" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Tipe Menu</label>
            <select id="type" name="type" class="form-control" required
                   style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                <option value="" disabled>Silahkan Pilih Tipe Menu</option>
                <option value="Burger">Burger</option>
                <option value="Drinks">Drinks</option>
                <option value="Side Dish">Side Dish</option>
            </select>
        </div>

        <div style="display: flex; gap: 15px; justify-content: flex-end; width: 100%; align-items: center;">
            <button type="submit" class="btn btn-primary"
            style="background-color: #007bff; color: #fff; border: none; padding: 12px 25px; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);">
                Simpan
            </button>
            <a href="<?php echo site_url('dashboard/items'); ?>" class="btn btn-secondary"
            style="background-color: #ff4d4d; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-size: 16px; text-align: center; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(255, 77, 77, 0.3);">
                Batal
            </a>
        </div>

    </form>
</div>

<!-- Include Bootstrap JS and dependencies (if not already included in a global footer) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Function to preview the selected image
    function previewImage() {
        const file = document.getElementById('images').files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.setAttribute('src', e.target.result);
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.setAttribute('src', '#');
            preview.style.display = 'none';
        }
    }
</script>

