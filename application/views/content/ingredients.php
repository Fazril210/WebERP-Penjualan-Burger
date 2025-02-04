<div class="content" style="background-color: #000; margin-bottom: 50px;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left: 20px; margin-top: 50px;">
        <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Daftar Ingredients</h1>

        <!-- Tombol Tambah Ingredient -->
        <a href="<?php echo site_url('ingredients/add'); ?>" class="btn btn-primary mb-4">Tambah Ingredients</a>

        <form id="searchForm" class="mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div style="flex: 1; margin-right: 20px;">
            <input type="text" class="form-control" id="searchInputIngredients" placeholder="Cari berdasarkan menu atau bahan baku..." onkeyup="searchIngredients()" 
                style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; width: 100%; box-sizing: border-box;">
        </div>
        
        <div style="flex: 1; text-align: left;">
            <!-- Tombol Print Semua Data -->
            <button type="button" class="btn btn-success" onclick="printAllDataIngredients()" 
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
        <!-- Harga Filter -->
        <div style="display: flex; flex-direction: column;">
    <label for="sortQuantity" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Urutkan Berdasarkan Jumlah</label>
    <select id="sortQuantity" onchange="applySortingAndFilters()" 
        style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
        <option value="">Pilih Urutan</option>
        <option value="asc">Jumlah Terkecil</option>
        <option value="desc">Jumlah Terbesar</option>
    </select>
</div>

</div>
</div>

        <!-- Tabel Ingredients -->
        <div class="table-responsive">
            <table id="ingredientsTable" class="table table-striped table-bordered" style="width: 100%; background-color: #fff; border-radius: 5px; overflow: hidden;">
                <thead style="background-color: #343a40; color: #fff; text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Menu</th>
                        <th>Bahan Baku</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align: center; color: #333;">
                    <?php if (!empty($ingredients)): ?>
                        <?php foreach ($ingredients as $ingredient): ?>
                            <tr id="row_ingredient<?php echo $ingredient->id_ingredient; ?>">
                                <td><?php echo $ingredient->id_ingredient; ?></td>
                                <td><?php echo $ingredient->name_items; ?></td>
                                <td><?php echo $ingredient->name_product; ?></td>
                                <td><?php echo $ingredient->quantity; ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-warning btn-sm edit-ingredient-btn" data-id="<?php echo $ingredient->id_ingredient; ?>" style="color: #fff; background-color: #ffc107; border-color: #ffc107;">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger btn-sm delete-ingredient-btn" data-id="<?php echo $ingredient->id_ingredient; ?>" style="color: #fff; background-color: #ff0000; border-color: #ff0000;">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Tidak ada data ingredients</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit Ingredient -->
<div class="modal fade" id="editIngredientModal" tabindex="-1" role="dialog" aria-labelledby="editIngredientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="editIngredientForm">
                <div class="modal-header" style="background-color: #007bff; color: white;">
                    <h5 class="modal-title" id="editIngredientModalLabel">Edit Ingredient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_ingredient" id="edit_id_ingredient">

                    <!-- Menu -->
                    <div class="form-group">
                        <label for="edit_id_items">Menu</label>
                        <select id="edit_id_items" name="id_items" class="form-control">
                            <?php foreach ($items as $item): ?>
                                <option value="<?php echo $item->id_items; ?>"><?php echo $item->name_items; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Bahan Baku -->
                    <div class="form-group">
                        <label for="edit_id_product">Bahan Baku</label>
                        <select id="edit_id_product" name="id_produk" class="form-control">
                            <?php foreach ($products as $product): ?>
                                <option value="<?php echo $product->id_produk; ?>"><?php echo $product->name_product; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Jumlah -->
                    <div class="form-group">
                        <label for="edit_quantity">Jumlah</label>
                        <input type="number" class="form-control" id="edit_quantity" name="quantity" required step="0.01">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Fungsi untuk menampilkan pesan dengan SweetAlert2
    function showMessage(message, type = 'success') {
        Swal.fire({
            icon: type,
            title: type === 'success' ? 'Berhasil!' : 'Error!',
            text: message,
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
        });
    }

    // Edit Ingredient
    $(document).on('click', '.edit-ingredient-btn', function () {
        const ingredientId = $(this).data('id');
        $('#editIngredientForm')[0].reset();
        $('#editIngredientModal').modal('show');

        $.ajax({
            url: "<?php echo site_url('ingredients/get/'); ?>" + ingredientId,
            method: "GET",
            dataType: "json",
            success: function (data) {
                if (data) {
                    $('#edit_id_ingredient').val(data.id_ingredient);
                    $('#edit_id_items').val(data.id_items).change();
                    $('#edit_id_product').val(data.id_produk).change();
                    $('#edit_quantity').val(data.quantity);
                } else {
                    showMessage('Data tidak ditemukan.', 'error');
                }
            },
            error: function () {
                showMessage('Terjadi kesalahan saat mengambil data.', 'error');
            }
        });
    });

    // Submit Edit Ingredient
    $('#editIngredientForm').submit(function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            url: "<?php echo site_url('ingredients/edit'); ?>",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    showMessage('Ingredient berhasil diperbarui!', 'success');
                    $('#editIngredientModal').modal('hide');
                    setTimeout(() => location.reload(), 2000);
                } else {
                    showMessage('Gagal memperbarui ingredient.', 'error');
                }
            },
            error: function () {
                showMessage('Terjadi kesalahan saat memperbarui ingredient.', 'error');
            }
        });
    });

    // Hapus Ingredient
    $(document).on('click', '.delete-ingredient-btn', function () {
        const ingredientId = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data akan dihapus secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo site_url('ingredients/delete/'); ?>" + ingredientId,
                    method: "POST",
                    dataType: "json",
                    success: function (response) {
                        if (response.status === 'success') {
                            showMessage('Ingredient berhasil dihapus!', 'success');
                            $(`#row_ingredient${ingredientId}`).remove();
                        } else {
                            showMessage('Gagal menghapus ingredient.', 'error');
                        }
                    },
                    error: function () {
                        showMessage('Terjadi kesalahan saat menghapus ingredient.', 'error');
                    }
                });
            }
        });
    });

    function applySortingAndFilters() {
        const quantityOrder = $('#sortQuantity').val();
        const menuOrder = $('#sortMenu').val();

        // Tampilkan spinner loading sementara data diproses
        $('#ingredientsTable tbody').html(`
            <tr>
                <td colspan="4" class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="mt-2">Memuat data...</div>
                </td>
            </tr>
        `);

        // Lakukan permintaan AJAX untuk sorting
        $.ajax({
            url: "<?php echo site_url('ingredients/sort_data'); ?>",
            method: "GET",
            data: { 
                quantity_order: quantityOrder,
                menu_order: menuOrder
            },
            dataType: "json",
            success: function(response) {
                let html = '';
                if (response.status === 'success' && response.data.length > 0) {
                    response.data.forEach(function(ingredient) {
                        html += `<tr>
                            <td>${ingredient.id_ingredient}</td>
                            <td>${ingredient.name_items}</td>
                            <td>${ingredient.name_product}</td>
                            <td>${ingredient.quantity}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm edit-ingredient-btn" data-id="${ingredient.id_ingredient}" style="color: #fff; background-color: #ffc107; border-color: #ffc107;">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm delete-ingredient-btn" data-id="${ingredient.id_ingredient}" style="color: #fff; background-color: #ff0000; border-color: #ff0000;">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </td>
                        </tr>`;
                    });
                } else {
                    html = '<tr><td colspan="4" class="text-center">Tidak ada data ingredients</td></tr>';
                }
                $('#ingredientsTable tbody').html(html);
            },
            error: function() {
                showMessage('Terjadi kesalahan saat mengambil data.', 'error');
                $('#ingredientsTable tbody').html('<tr><td colspan="4" class="text-center">Gagal memuat data</td></tr>');
            }
        });
    }

</script>
