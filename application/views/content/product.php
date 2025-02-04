<div class="content" style="background-color: #000; margin-bottom: 50px;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left: 20px; margin-top: 50px;">
        <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Daftar Bahan Baku</h1>

        <!-- Tombol Tambah product -->
        <a href="<?php echo site_url('dashboard/add_product'); ?>" class="btn btn-primary mb-4">Tambah Bahan Baku</a>

        <!-- Form Pencarian -->
        <form id="searchForm" class="mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div style="flex: 1; margin-right: 20px;">
                <input type="text" class="form-control" id="searchInputProduct" placeholder="Cari berdasarkan nama atau supplier..." onkeyup="searchProduk()" 
                    style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; width: 100%; box-sizing: border-box;">
            </div>
            
            <div style="flex: 1; text-align: left;">
                <!-- Tombol Print Semua Data -->
                <button type="button" class="btn btn-success" onclick="printAllDataProduk()" 
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
                <!-- Stok Filter -->
                <div style="display: flex; flex-direction: column;">
                    <label for="totalPriceFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Stok</label>
                    <select id="sortStock"
                        style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                        <option value="">Semua</option>
                        <option value="highest">Stok Tertinggi</option>
                        <option value="lowest">Stok Terendah</option>
                    </select>
                </div>

                <!-- Harga Filter -->
                <div style="display: flex; flex-direction: column;">
                    <label for="unitPriceFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Harga</label>
                    <select id="sortPrice"
                        style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                        <option value="">Urutkan Harga</option>
                        <option value="highest">Harga Tertinggi ke Terendah</option>
                        <option value="lowest">Harga Terendah ke Tertinggi</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tabel product dengan Bootstrap -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="productTable">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align: center;">Nama Produk</th>
                        <th style="text-align: center;">Stok</th>
                        <th style="text-align: center;">Harga Satuan</th>
                        <th style="text-align: center;">Nama Supplier</th>
                        <th style="text-align: center;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <tr id="row_product<?php echo $product->id_produk; ?>" class="product-row" 
                                data-supplier-id="<?php echo isset($product->id_suppliers) ? $product->id_suppliers : ''; ?>">
                                <td style="text-align: center;"><?php echo $product->name_product; ?></td>
                                <td style="text-align: center;"><?php echo $product->stock; ?> <?php echo $product->unit_of_goods; ?></td>
                                <td style="text-align: center;"><?php echo 'Rp ' . number_format($product->price_per_piece, 0, ',', '.'); ?></td>
                                <td style="text-align: center;"><?php echo isset($product->name_suppliers) ? $product->name_suppliers : 'Tidak Ada Supplier'; ?></td>
                                <td style="text-align: center;">
                                    <!-- Tombol Edit dengan Ikon -->
                                    <button type="button" class="btn btn-warning btn-sm edit-product-btn" data-id="<?php echo $product->id_produk; ?>" style="color: #fff; background-color: #ffc107; border-color: #ffc107;">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <!-- Tombol Hapus dengan Ikon -->
                                    <button type="button" class="btn btn-danger btn-sm delete-product-btn" data-id="<?php echo $product->id_produk; ?>" style="color: #fff; background-color: #ff0000; border-color: #ff0000;">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data produk</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit product -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: -200px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: white; border-bottom: none; border-radius: 10px;">
                <h5 class="modal-title" id="editproductModalLabel"><i class="fas fa-edit"></i> Edit product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <form id="editproductForm" action="<?php echo site_url('dashboard/do_edit_product'); ?>" method="POST">
                    <input type="hidden" name="id_produk" id="id_produk">
                    
                    <div class="form-group">
                        <label for="name_product">Nama Produk</label>
                        <input type="text" class="form-control" id="name_product" name="name_product" required placeholder="Masukkan Nama Produk">
                    </div>
                    
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" class="form-control" id="stock" name="stock" required placeholder="Masukkan Stok" step="0.01">
                    </div>

                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="unit_of_goods" style="font-size: 16px; color: #555;">Satuan Produk</label>
                        <select id="unit_of_goods" name="unit_of_goods" class="form-control" required
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; box-sizing: border-box;">
                            <option value="" disabled selected>Pilih Satuan Produk</option>
                            <option value="pcs">Pcs</option>
                            <option value="kg">Kilogram (kg)</option>
                            <option value="gram">Gram (g)</option>
                            <option value="liter">Liter (l)</option>
                            <option value="ml">Mililiter (ml)</option>
                            <option value="pack">Pack</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price_per_piece">Harga Per Satuan</label>
                        <input type="number" class="form-control" id="price_per_piece" name="price_per_piece" required placeholder="Masukkan Harga per Satuan">
                    </div>

                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <select id="id_suppliers" name="id_suppliers" class="form-control" required>
                            <option value="" disabled>Pilih Supplier</option>
                            <?php foreach ($suppliers as $supplier): ?>
                                <option value="<?php echo $supplier->id_suppliers; ?>">
                                    <?php echo $supplier->name_suppliers; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus product -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ddd; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="modal-header" style="background-color: #f8d7da; border-bottom: none; color: #721c24; font-weight: bold; border-radius: 10px;">
                <h5 class="modal-title" id="deleteProductModalLabel"><i class="fas fa-trash-alt"></i> Hapus Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px; font-size: 16px; color: #333; text-align: center;">
                <p>Apakah Anda yakin ingin menghapus produk ini?</p>
            </div>
            <div class="modal-footer" style="display: flex; justify-content: center; padding: 20px;">
                <button type="button" class="btn btn-danger" id="confirmDeleteProductBtn" style="background-color: #dc3545; color: white; border-radius: 30px; font-size: 16px; padding: 10px 20px; transition: background-color 0.3s ease;">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengedit produk
    function editProduct(id) {
        $.ajax({
            url: "<?php echo site_url('dashboard/edit_product/'); ?>" + id,
            type: 'GET',
            success: function(response) {
                $('#editProductModal #id_produk').val(response.id_produk);
                $('#editProductModal #name_product').val(response.name_product);
                $('#editProductModal #stock').val(response.stock);
                $('#editProductModal #unit_of_goods').val(response.unit_of_goods);
                $('#editProductModal #price_per_piece').val(response.price_per_piece);
                $('#editProductModal #id_suppliers').val(response.id_suppliers);
                $('#editProductModal').modal('show');
            },
            error: function() {
                alert('Terjadi kesalahan saat mengambil data produk');
            }
        });
    }

    // Fungsi untuk menghapus produk
    function deleteProduct(productId) {
        $('#deleteProductModal').modal('show');
        $('#confirmDeleteProductBtn').off('click').on('click', function() {
            $.ajax({
                url: "<?php echo site_url('dashboard/delete_product/'); ?>" + productId,
                method: "POST",
                success: function(response) {
                    if(response.status === 'success') {
                        $('#deleteProductModal').modal('hide');
                        // Refresh tabel
                        applySortingAndFilters();
                    } else {
                        alert('Gagal menghapus produk');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menghapus produk');
                }
            });
        });
    }

    // Event delegation untuk tombol edit dan delete
    $(document).on('click', '.edit-product-btn', function() {
        var productId = $(this).data('id');
        editProduct(productId);
    });

    $(document).on('click', '.delete-product-btn', function() {
        var productId = $(this).data('id');
        deleteProduct(productId);
    });

    // Fungsi untuk menerapkan sorting dan filter
    function applySortingAndFilters() {
        let sortPrice = $('#sortPrice').val();
        let sortStock = $('#sortStock').val();

        // Tampilkan loading spinner
        $('#productTable tbody').html(`
            <tr>
                <td colspan="5" class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="mt-2">Memuat data...</div>
                </td>
            </tr>
        `);

        // Kirim permintaan AJAX untuk mengambil data
        $.ajax({
            url: "<?php echo site_url('dashboard/sort_filter_products'); ?>",
            method: "GET",
            data: {
                sort_price: sortPrice,
                sort_stock: sortStock,
            },
            dataType: "json",
            success: function(data) {
                let html = '';
                if (data.length > 0) {
                    // Loop melalui data produk
                    $.each(data, function(index, product) {
                        html += '<tr>';
                        html += '<td style="text-align: center;">' + product.name_product + '</td>';
                        html += '<td style="text-align: center;">' + product.stock + ' ' + product.unit_of_goods + '</td>';
                        html += '<td style="text-align: center;">' + 'Rp ' + parseFloat(product.price_per_piece).toLocaleString('id-ID') + '</td>';
                        html += '<td style="text-align: center;">' + (product.name_suppliers || 'Tidak Ada Supplier') + '</td>';
                        html += '<td style="text-align: center;">';
                        html += '<button type="button" class="btn btn-warning btn-sm edit-product-btn" data-id="' + product.id_produk + '" style="background-color: #ffc107; color: white"><i class="fas fa-edit"></i> Edit</button> ';
                        html += '<button type="button" class="btn btn-danger btn-sm delete-product-btn" data-id="' + product.id_produk + '" style="background-color: #Ff0000; color: white"><i class="fas fa-trash-alt"></i> Hapus</button>';
                        html += '</td>';
                        html += '</tr>';
                    });
                } else {
                    // Tampilkan pesan jika tidak ada data
                    html = '<tr><td colspan="5" class="text-center">Tidak ada data produk</td></tr>';
                }
                // Update tabel dengan data baru
                $('#productTable tbody').html(html);
            },
            error: function() {
                alert('Terjadi kesalahan saat mengambil data.');
            }
        });
    }

    // Event listener untuk perubahan filter
    $('#sortPrice, #sortStock').change(function() {
        applySortingAndFilters();
    });
</script>