<div class="content" style="background-color: #000; margin-bottom: 50px;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left: 20px; margin-top: 50px;">
        <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Daftar Member</h1>

    <!-- Tombol Tambah Member -->
    <a href="<?php echo site_url('dashboard/add_members'); ?>" class="btn btn-primary mb-4">Tambah Member</a>

    <!-- Form Pencarian -->
    <form id="searchForm" class="mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div style="flex: 1; margin-right: 20px;">
            <input type="text" class="form-control" id="searchInputMember" placeholder="Cari berdasarkan nama, email, atau telepon..." onkeyup="searchMember()" 
                style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; width: 100%; box-sizing: border-box;">
        </div>
        <div>
            <!-- Tombol Print Semua Data -->
            <button type="button" class="btn btn-success" onclick="printAllDataMember()" 
                style="background-color: orange; color: white; padding: 10px 20px; border-radius: 5px; border: none; font-size: 16px; cursor: pointer;"> 
                <i class="fas fa-print"></i> Cetak Semua Data
            </button>
        </div>
    </form>

    <!-- Tabel Member dengan Bootstrap -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="memberTable">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Email</th>
                    <th style="text-align: center;">Telepon</th>
                    <th style="text-align: center;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($members)): ?>
                    <?php foreach ($members as $member): ?>
                        <tr id="row_members<?php echo $member->id_members; ?>" class="member-row">
                            <td style="text-align: center;"><?php echo $member->name; ?></td>
                            <td style="text-align: center;"><?php echo $member->email; ?></td>
                            <td style="text-align: center;"><?php echo $member->phone; ?></td>
                            <td style="text-align: center;">
                                <!-- Tombol Edit dengan Ikon -->
                                <button type="button" class="btn btn-warning btn-sm" onclick="editMember(<?php echo $member->id_members; ?>)" style="background-color: #ffc107; color: white">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <!-- Tombol Hapus dengan Ikon -->
                                <button href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteMember(<?php echo $member->id_members; ?>)" style="background-color: #Ff0000; color: white">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data member</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Edit Member -->
<div class="modal fade" id="editMemberModal" tabindex="-1" role="dialog" aria-labelledby="editMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: white; border-bottom: none; border-radius: 10px;">
                <h5 class="modal-title" id="editMemberModalLabel"><i class="fas fa-edit"></i> Edit Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <form id="editMemberForm" action="<?php echo site_url('dashboard/do_edit_members'); ?>" method="POST">
                    <input type="hidden" name="id_members" id="id_members">
                    
                    <div class="form-group">
                        <label for="name">Nama Member</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan Nama Member">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan Email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Masukkan Telepon">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Konfirmasi Hapus Member -->
<div class="modal fade" id="deleteMemberModal" tabindex="-1" role="dialog" aria-labelledby="deleteMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ddd; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="modal-header" style="background-color: #f8d7da; border-bottom: none; color: #721c24; font-weight: bold; border-radius: 10px;">
                <h5 class="modal-title" id="deleteMemberModalLabel"><i class="fas fa-trash-alt"></i> Hapus Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px; font-size: 16px; color: #333; text-align: center;">
                <p>Apakah Anda yakin ingin menghapus Member ini?</p>
            </div>
            <div class="modal-footer" style="display: flex; justify-content: center; padding: 20px;">
                <button type="button" class="btn btn-danger" id="confirmDeleteMemberBtn" style="background-color: #dc3545; color: white; border-radius: 30px; font-size: 16px; padding: 10px 20px; transition: background-color 0.3s ease;">Hapus</button>
            </div>
        </div>
    </div>
</div>


</div>

