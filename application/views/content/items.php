


<div class="content" style="background-color: #000; margin-bottom: 50px;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left: 20px; margin-top: 50px;">
        <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Daftar Produk</h1>


        <!-- Tombol Tambah Item -->
        <a href="<?php echo site_url('dashboard/add_item'); ?>" class="btn btn-primary mb-4">Tambah Produk</a>

        <form id="searchForm" class="mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <!-- Form Pencarian -->
    <div style="flex: 2; margin-right: 20px;">
        <input type="text" class="form-control" id="searchInputItem" placeholder="Cari berdasarkan nama atau harga..." 
            onkeyup="searchItem()" 
            style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; width: 100%; box-sizing: border-box;">
    </div>
    <!-- Tombol Print -->
    <div style="text-align: left;">
        <button type="button" class="btn btn-success" onclick="printAllDataItem()" 
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
            <label for="totalPriceFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Harga</label>
            <select id="sortPrice" 
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
    <option value="highest">Harga Tertinggi ke Terendah</option>
    <option value="lowest">Harga Terendah ke Tertinggi</option>
            </select>
        </div>

        <!-- Stok Filter -->
        <div style="display: flex; flex-direction: column;">
            <label for="unitPriceFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Stok</label>
            <select id="sortStock"
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
            <option value="highest">Stok Tertinggi</option>
            <option value="lowest">Stok Terendah</option>
            </select>
        </div>

        <!-- Status Filter -->
        <div style="display: flex; flex-direction: column;">
            <label for="quantityFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Status</label>
            <select id="filterStatus"
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
        </div>

        <!-- Tipe Menu Filter -->
        <div style="display: flex; flex-direction: column;">
            <label for="paymentMethodFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Tipe Menu</label>
            <select id="filterType"
                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                <option value="">Semua</option>
            <option value="Burger">Burger</option>
            <option value="Drinks">Drinks</option>
            <option value="Side Dish">Side Dish</option>
            </select>
        </div>
</div>
</div>


        <!-- Tabel Items dengan Bootstrap -->
        <div class="table-responsive">
        <table id="itemTable" class="display" style="width: 100%; background-color: #fff; border-radius: 5px; overflow: hidden;">
        <thead style="background-color: #343a40; color: #fff; text-align: center;">
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Harga</th>
                        <th style="text-align: center;">Stok</th>
                        <th style="text-align: center;">Gambar</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Tipe Menu</th>
                        <th style="text-align: center;">AKSI</th>
                    </tr>
                </thead>
                <tbody style="text-align: center; color: #333;">
                    <?php if (!empty($items)): ?>
                        <?php foreach ($items as $item): ?>
                            <tr id="row_items<?php echo $item->id_items; ?>" class="item-row">
                                <td style="text-align: center;"><?php echo $item->id_items; ?></td>
                                <td style="text-align: center;"><?php echo $item->name_items; ?></td>
                                <td style="text-align: center;"><?php echo 'Rp ' . number_format($item->price_items, 0, ',', '.'); ?></td>
                                <td style="text-align: center;"><?php echo $item->stock_items; ?></td>
                                <td style="text-align: center;">
                                    <?php if($item->images): ?>
                                        <img src="<?php echo base_url('assets/images/' . $item->images); ?>" alt="Gambar Item" width="50" height="50">
                                    <?php else: ?>
                                        Tidak ada gambar
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;"><?php echo $item->status; ?></td>
                                <td style="text-align: center;"><?php echo $item->type; ?></td>
                                <td style="text-align: center;">
                                    <!-- Tombol Edit dengan Ikon -->
                                    <button type="button" class="btn btn-warning btn-sm edit-item-btn" data-id="<?php echo $item->id_items; ?>"  style="color: #fff; background-color: #ffc107; border-color: #ffc107;">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <!-- Tombol Hapus dengan Ikon -->
                                    <button href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteItem(<?php echo $item->id_items; ?>)"  style="color: #fff; background-color: #ff0000; border-color: #ff0000;">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data item</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit Item -->
    <div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="margin-top: -210px;">
            <div class="modal-content">
                <form id="editItemForm" enctype="multipart/form-data">
                    <div class="modal-header" style="background-color: #007bff; color: white; border-bottom: none; border-radius: 10px; ">
                        <h5 class="modal-title" id="editItemModalLabel"><i class="fas fa-edit"></i> Edit Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 20px;">
                        <!-- Alert Messages within Modal -->
                        <div id="editItemAlert"></div>

                        <input type="hidden" name="id_items" id="edit_id_items">
                        
                        <div class="form-group">
                            <label for="edit_name_items">Nama Item</label>
                            <input type="text" class="form-control" id="edit_name_items" name="name_items" required placeholder="Masukkan Nama Item">
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_price_items">Harga</label>
                            <input type="number" step="0.01" class="form-control" id="edit_price_items" name="price_items" required placeholder="Masukkan Harga Item">
                        </div>

                        <div class="form-group">
                            <label for="edit_stock_items">Stok</label>
                            <input type="number" class="form-control" id="edit_stock_items" name="stock_items" required placeholder="Masukkan Stok Item">
                        </div>
    
                        <div class="form-group" style="display: flex; align-items: center;">
    <div style="flex: 1;">
        <label for="edit_images" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="edit_images" name="images" style="width: 350px;">
        <small style="display: block; color: #6c757d;">Biarkan kosong jika tidak ingin mengganti gambar.</small>
    </div>
    <div id="currentImage" style="margin-left: 7px; text-align: center;">
        <img src="https://via.placeholder.com/100" alt="Current Image" style="max-width: 100px; height: auto; border: 1px solid #ccc; border-radius: 5px;">
    </div>
</div>

    
                        <div class="form-group" style="margin-top: -8px;">
                            <label for="edit_status">Status</label>
                            <select id="edit_status" name="status" class="form-control" required>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edit_type">Type</label>
                            <select id="edit_type" name="type" class="form-control" required>
                                <option value="Burger">Burger</option>
                                <option value="Drinks">Drinks</option>
                                <option value="Side Dish">Side Dish</option>
                            </select>
                        </div>
    
                    </div>
                    <div class="modal-footer" style="padding: 10px; margin-top: -25px;">
                        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; font-size: 16px; cursor: pointer;">
                            Simpan Perubahan
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red; color: #fff; padding: 10px 20px; border-radius: 4px; font-size: 16px; cursor: pointer;">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus Item -->
    <div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content" style="border-radius: 8px; border: 1px solid #ddd; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="background-color: #f8d7da; border-bottom: none; color: #721c24; font-weight: bold; border-radius: 10px;">
                    <h5 class="modal-title" id="deleteItemModalLabel"><i class="fas fa-trash-alt"></i> Hapus Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 20px; font-size: 16px; color: #333; text-align: center;">
                    <p>Apakah Anda yakin ingin menghapus item ini?</p>
                </div>
                <div class="modal-footer" style="display: flex; justify-content: center; padding: 20px;">
                    <button type="button" class="btn btn-danger" id="confirmDeleteItemBtn" style="background-color: #dc3545; color: white; border-radius: 30px; font-size: 16px; padding: 10px 20px; transition: background-color 0.3s ease;">Hapus</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // JavaScript functions for search, delete, and print

    // Search Items
    function searchItem() {
        let keyword = $('#searchInputItem').val();
        $.ajax({
            url: "<?php echo site_url('dashboard/search_items'); ?>",
            method: "GET",
            data: { keyword: keyword },
            dataType: "json",
            success: function(data) {
                let html = '';
                if(data.length > 0){
                    $.each(data, function(index, item){
                        html += '<tr>';
                        html += '<td style="text-align: center;">' + item.id_items + '</td>';
                        html += '<td style="text-align: center;">' + item.name_items + '</td>';
                        html += '<td style="text-align: center;">' + 'Rp ' + parseFloat(item.price_items).toLocaleString('id-ID') + '</td>';
                        html += '<td style="text-align: center;">' + item.stock_items + '</td>';
                        if(item.images){
                            html += '<td style="text-align: center;"><img src="<?php echo base_url("assets/images/"); ?>' + item.images + '" alt="Gambar Item" width="50" height="50"></td>';
                        } else {
                            html += '<td style="text-align: center;">Tidak ada gambar</td>';
                        }
                        html += '<td style="text-align: center;">' + item.status + '</td>';
                        html += '<td style="text-align: center;">' + item.type + '</td>';
                        html += '<td style="text-align: center;">';
                        html += '<button type="button" class="btn btn-warning btn-sm edit-item-btn" data-id="' + item.id_items + '" style="background-color: #009990; color: white"><i class="fas fa-edit"></i> Edit</button> ';
                        html += '<button href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteItem(' + item.id_items + ')" style="background-color: #FA4032; color: white"><i class="fas fa-trash-alt"></i> Hapus</button> ';
                        html += '</td>';
                        html += '</tr>';
                    });
                } else {
                    html = '<tr><td colspan="8" class="text-center">Tidak ada data item</td></tr>';
                }
                $('#itemTable tbody').html(html);
            },
            error: function(){
                alert('Terjadi kesalahan saat mencari item.');
            }
        });
    }

    // Delete Item
    let deleteItemId;

    function deleteItem(id) {
        deleteItemId = id;
        $('#deleteItemModal').modal('show');
    }

   $('#confirmDeleteItemBtn').click(function () {
    $.ajax({
        url: "<?php echo site_url('dashboard/delete_item/'); ?>" + deleteItemId,
        method: "POST",
        dataType: "json",
        success: function (response) {
            console.log(response); // Debug log
            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Item berhasil dihapus!',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
                $('#deleteItemModal').modal('hide');
                $('#row_items' + deleteItemId).remove();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: response.message || 'Gagal menghapus item.',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error:', xhr.responseText); // Debug log
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat menghapus item. Silakan coba lagi.',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        }
    });
});


    

    // Print Specific Row Data
    function printRowDataItem(id) {
        let row = $('#row_items' + id).html();
        let newWin = window.open('', 'Print', 'height=600,width=800');
        newWin.document.write('<html><head><title>Print Item</title>');
        newWin.document.write('</head><body>');
        newWin.document.write('<table border="1" style="width:100%;">' + row + '</table>');
        newWin.document.write('</body></html>');
        newWin.document.close();
        newWin.print();
    }

    // Handle Edit Item Modal Show
    $(document).on('click', '.edit-item-btn', function(){
        let itemId = $(this).data('id');
        $('#editItemAlert').html(''); // Clear previous alerts
        $('#editItemForm').hide(); // Hide form while loading
        $('#editItemModal').modal('show'); // Show modal first
        $('#editItemModal .modal-body').append('<div id="loader">Loading...</div>'); // Add loader

        // Fetch item data via AJAX
        $.ajax({
            url: "<?php echo site_url('dashboard/get_item/'); ?>" + itemId,
            method: "GET",
            dataType: "json",
            success: function(data){
                $('#loader').remove(); // Remove loader
                $('#editItemForm').show(); // Show form
                if(data){
                    $('#edit_id_items').val(data.id_items);
                    $('#edit_name_items').val(data.name_items);
                    $('#edit_price_items').val(data.price_items);
                    $('#edit_stock_items').val(data.stock_items);
                    $('#edit_status').val(data.status).change();
                    $('#edit_type').val(data.type).change();
                    if(data.images){
                        $('#currentImage').html('<img src="<?php echo base_url("assets/images/"); ?>' + data.images + '" alt="Gambar Item" width="100" height="100">');
                    } else {
                        $('#currentImage').html('Tidak ada gambar');
                    }
                } else {
                    alert('Data tidak ditemukan.');
                    $('#editItemModal').modal('hide');
                }
            },
            error: function(){
                $('#loader').remove(); // Remove loader
                $('#editItemForm').show(); // Show form
                alert('Terjadi kesalahan saat mengambil data item.');
                $('#editItemModal').modal('hide');
            }
        });
    });

    // Handle Edit Item Form Submission
    $('#editItemForm').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: "<?php echo site_url('dashboard/do_edit_item'); ?>",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response){
                if(response.status === 'success'){
                    $('#editItemAlert').html('<div class="alert alert-success alert-dismissible fade show" role="alert">' + response.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    // Update the table row with new data
                    let item = response.data;
                    let row = `
                        <td style="text-align: center;">${item.id_items}</td>
                        <td style="text-align: center;">${item.name_items}</td>
                        <td style="text-align: center;">Rp ${parseFloat(item.price_items).toLocaleString('id-ID')}</td>
                        <td style="text-align: center;">${item.stock_items}</td>
                        <td style="text-align: center;">
                            ${item.images ? `<img src="<?php echo base_url("assets/images/"); ?>${item.images}" alt="Gambar Item" width="50" height="50">` : 'Tidak ada gambar'}
                        </td>
                        <td style="text-align: center;">${item.status}</td>
                        <td style="text-align: center;">${item.type}</td>
                        <td style="text-align: center;">
                            <button type="button" class="btn btn-warning btn-sm edit-item-btn" data-id="${item.id_items}" style="background-color: #009990; color: white"><i class="fas fa-edit"></i> Edit</button> 
                            <button href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteItem(${item.id_items})" style="background-color: #FA4032; color: white"><i class="fas fa-trash-alt"></i> Hapus</button> 
                           
                        </td>
                    `;
                    $('#row_items' + item.id_items).html(row);
                    // Optionally, close the modal after a short delay
                    setTimeout(function(){
                        $('#editItemModal').modal('hide');
                    }, 1500);
                } else {
                    $('#editItemAlert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + response.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
            },
            error: function(){
                $('#editItemAlert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Terjadi kesalahan saat mengedit item.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
        });
    });

    // Fungsi untuk menerapkan sorting dan filtering
    function applySortingAndFilters() {
    let sortPrice = $('#sortPrice').val();
    let sortStock = $('#sortStock').val();
    let status = $('#filterStatus').val();
    let type = $('#filterType').val();

    console.log("Sort Price: ", sortPrice); // Debugging
    
    $('#itemTable tbody').html(`
        <tr>
            <td colspan="8" class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="mt-2">Memuat data...</div>
            </td>
        </tr>
    `);

    $.ajax({
        url: "<?php echo site_url('dashboard/sort_filter_items'); ?>",
        method: "GET",
        data: {
            sort_price: sortPrice,
            sort_stock: sortStock,
            status: status,
            type: type
        },
        dataType: "json",
        success: function(data) {
            let html = '';
            if (data.length > 0) {
                $.each(data, function(index, item) {
                    html += '<tr>';
                    html += '<td style="text-align: center;">' + item.id_items + '</td>';
                    html += '<td style="text-align: center;">' + item.name_items + '</td>';
                    html += '<td style="text-align: center;">' + 'Rp ' + parseFloat(item.price_items).toLocaleString('id-ID') + '</td>';
                    html += '<td style="text-align: center;">' + item.stock_items + '</td>';
                    html += '<td style="text-align: center;">' + (item.images ? `<img src="<?php echo base_url("assets/images/"); ?>${item.images}" alt="Gambar Item" width="50" height="50">` : 'Tidak ada gambar') + '</td>';
                    html += '<td style="text-align: center;">' + item.status + '</td>';
                    html += '<td style="text-align: center;">' + item.type + '</td>';
                    html += '<td style="text-align: center;">';
                    html += '<button type="button" class="btn btn-warning btn-sm edit-item-btn" data-id="' + item.id_items + '" style="background-color: #009990; color: white"><i class="fas fa-edit"></i> Edit</button> ';
                    html += '<button href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteItem(' + item.id_items + ')" style="background-color: #FA4032; color: white"><i class="fas fa-trash-alt"></i> Hapus</button>';
                    html += '</td>';
                    html += '</tr>';
                });
            } else {
                html = '<tr><td colspan="8" class="text-center">Tidak ada data item</td></tr>';
            }
            $('#itemTable tbody').html(html);
        },
        error: function() {
            alert('Terjadi kesalahan saat mengambil data.');
        }
    });
}

// Event listener
$('#sortPrice, #sortStock, #filterStatus, #filterType').change(function() {
    applySortingAndFilters();
});

// Fungsi untuk menampilkan pesan
function showSuccessMessage(message) {
    let successAlert = `
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 1050; min-width: 300px;">
            ${message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>`;
    $('body').append(successAlert);
    setTimeout(() => {
        $('.alert-success').alert('close');
    }, 3000); // Pesan hilang setelah 3 detik
}

// Fungsi untuk menampilkan pesan
function showMessage(message, type = 'success') {
    const alertType = type === 'success' ? 'alert-success' : 'alert-danger';
    const alertHTML = `
        <div class="alert ${alertType} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;
    $('#alertMessageContainer').append(alertHTML);

    // Hapus pesan setelah 3 detik
    setTimeout(() => {
        $('#alertMessageContainer .alert').first().alert('close');
    }, 3000);
}


$('#confirmDeleteItemBtn').click(function () {
    $.ajax({
        url: "<?php echo site_url('dashboard/delete_item/'); ?>" + deleteItemId,
        method: "POST",
        dataType: "json",
        success: function (response) {
            console.log(response); // Debugging
            if (!response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Respons server kosong.',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
                return;
            }

            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: response.message,
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
                $('#deleteItemModal').modal('hide');
                $('#row_items' + deleteItemId).remove();
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: response.message,
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error:', xhr.responseText); // Debug log
            Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: response.message,
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
        }
    });
});





$('#editItemForm').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: "<?php echo site_url('dashboard/do_edit_item'); ?>",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Item berhasil diperbarui!',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });

                        // Perbarui baris di tabel
                        let item = response.data;
                let row = `
                    <td style="text-align: center;">${item.id_items}</td>
                    <td style="text-align: center;">${item.name_items}</td>
                    <td style="text-align: center;">Rp ${parseFloat(item.price_items).toLocaleString('id-ID')}</td>
                    <td style="text-align: center;">${item.stock_items}</td>
                    <td style="text-align: center;">
                        ${item.images ? `<img src="<?php echo base_url("assets/images/"); ?>${item.images}" alt="Gambar Item" width="50" height="50">` : 'Tidak ada gambar'}
                    </td>
                    <td style="text-align: center;">${item.status}</td>
                    <td style="text-align: center;">${item.type}</td>
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-warning btn-sm edit-item-btn" data-id="${item.id_items}" style="background-color: #009990; color: white"><i class="fas fa-edit"></i> Edit</button>
                        <button href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteItem(${item.id_items})" style="background-color: #FA4032; color: white"><i class="fas fa-trash-alt"></i> Hapus</button>
                    </td>
                `;
                $('#row_items' + item.id_items).html(row);

                $('#editItemModal').modal('hide');

                setTimeout(() => {
                    $('#editItemModal').modal('hide');
                    location.reload();
                }, 2000);
            } else {
                showErrorMessage(response.message);
            }
        },
        error: function () {
            showErrorMessage('Terjadi kesalahan saat memperbarui item.');
        }
    });
});



function showSuccessMessage(message) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: message,
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false
    });
}

function showErrorMessage(message) {
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: message,
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false
    });
}

// Contoh penggunaan setelah menambah data
$('#addItemForm').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: "<?php echo site_url('dashboard/add_item'); ?>",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                showSuccessMessage('Item berhasil ditambahkan!');
                setTimeout(() => location.reload(), 2000);
            } else {
                showErrorMessage(response.message);
            }
        },
        error: function () {
            showErrorMessage('Terjadi kesalahan saat menambah item.');
        }
    });
});


</script>


