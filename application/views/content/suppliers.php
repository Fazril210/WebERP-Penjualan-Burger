<div class="content" style="background-color: #000; margin-bottom: 50px;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left: 20px; margin-top: 50px;">
        <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Daftar Pemasok</h1>

    <!-- Tombol Tambah Supplier -->
    <a href="<?php echo site_url('dashboard/add_supplier'); ?>" class="btn btn-primary mb-4">Tambah Pemasok</a>

    <!-- Form Pencarian -->
    <form id="searchForm" class="mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div style="flex: 1; margin-right: 20px;">
            <input type="text" class="form-control" id="searchInputSupplier" placeholder="Cari berdasarkan nama, telepon, atau alamat" onkeyup="searchSupplier()" 
                style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; width: 100%; box-sizing: border-box;">
        </div>
        <div>
            <!-- Tombol Print Semua Data -->
            <button type="button" class="btn btn-success" onclick="printAllDataSupplier()" 
                style="background-color: orange; color: white; padding: 10px 20px; border-radius: 5px; border: none; font-size: 16px; cursor: pointer;"> 
                <i class="fas fa-print"></i> Cetak Semua Data
            </button>
        </div>
    </form>

    <!-- Tabel Supplier dengan Bootstrap -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="supplierTable">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Telepon</th>
                    <th style="text-align: center;">Alamat</th>
                    <th style="text-align: center;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($suppliers)): ?>
                    <?php foreach ($suppliers as $supplier): ?>
                        <tr id="row_suppliers<?php echo $supplier->id_suppliers; ?>" class="supplier-row">
                            <td style="text-align: center;"><?php echo $supplier->name_suppliers; ?></td>
                            <td style="text-align: center;"><?php echo $supplier->phone; ?></td>
                            <td style="text-align: center;"><?php echo $supplier->alamat; ?></td>
                            <td style="text-align: center;">
                                <!-- Tombol Edit dengan Ikon -->
                                <button type="button" class="btn btn-warning btn-sm" onclick="editSupplier(<?php echo $supplier->id_suppliers; ?>)" style="color: #fff; background-color: #ffc107; border-color: #ffc107;">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <!-- Tombol Hapus dengan Ikon -->
                                <button href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteSupplier(<?php echo $supplier->id_suppliers; ?>)" style="color: #fff; background-color: #ff0000; border-color: #ff0000;">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                                <!-- Tombol Print Baris -->
                                <button type="button" class="btn btn-info btn-sm" onclick="printRowDataSupplier(<?php echo $supplier->id_suppliers; ?>)" style="color: #fff; background-color: #3498db; border-color: #3498db;">
                                    <i class="fas fa-print"></i> Print
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data supplier</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal Edit Supplier -->
<div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: white; border-bottom: none; border-radius: 10px;">
                <h5 class="modal-title" id="editSupplierModalLabel"><i class="fas fa-edit"></i> Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <form id="editSupplierForm" action="<?php echo site_url('dashboard/do_edit_supplier'); ?>" method="POST">
                    <input type="hidden" name="supplier_id" id="supplier_id">
                    
                    <div class="form-group">
                        <label for="name_suppliers">Nama Supplier</label>
                        <input type="text" class="form-control" id="name_suppliers" name="name_suppliers" required placeholder="Masukkan Nama Supplier">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required placeholder="Masukkan Nomor Telepon">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="4" required placeholder="Masukkan Alamat Supplier"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Konfirmasi Hapus Supplier -->
<div class="modal fade" id="deleteSupplierModal" tabindex="-1" role="dialog" aria-labelledby="deleteSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ddd; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="modal-header" style="background-color: #f8d7da; border-bottom: none; color: #721c24; font-weight: bold; border-radius: 10px;">
                <h5 class="modal-title" id="deleteSupplierModalLabel"><i class="fas fa-trash-alt"></i> Hapus Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px; font-size: 16px; color: #333; text-align: center;">
                <p>Apakah Anda yakin ingin menghapus supplier ini? </p>
            </div>
            <div class="modal-footer" style="display: flex; justify-content: center; padding: 20px;">
                <button type="button" class="btn btn-danger" id="confirmDeleteSupplierBtn" style="background-color: #dc3545; color: white; border-radius: 30px; font-size: 16px; padding: 10px 20px; transition: background-color 0.3s ease;">Hapus</button>
            </div>
        </div>
    </div>
</div>
</div>