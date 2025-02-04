<style>
    /* Gaya untuk tabel */
    .table-responsive {
        overflow-x: auto; /* Membuat tabel bisa di-scroll horizontal jika melebihi lebar layar */
        width: 100%; /* Pastikan tabel mengambil lebar penuh */
    }

    #karyawanTable {
        width: 100%; /* Tabel mengambil lebar penuh */
        border-collapse: collapse; /* Hilangkan jarak antar sel */
    }

    #karyawanTable th,
    #karyawanTable td {
        padding: 12px; /* Padding untuk sel tabel */
        text-align: center; /* Teks di tengah */
        border: 1px solid #ddd; /* Garis antar sel */
    }

    #karyawanTable th {
        background-color: #343a40; /* Warna latar header */
        color: #fff; /* Warna teks header */
    }

    #karyawanTable tr:nth-child(even) {
        background-color: #f8f9fa; /* Warna latar baris genap */
    }

    #karyawanTable tr:hover {
        background-color: #F3881C; /* Warna latar saat hover */
    }

    /* Gaya khusus untuk modal edit */
    #editKaryawanModal .modal-dialog {
        margin-top: -10%; /* Sesuaikan nilai ini sesuai kebutuhan */
    }

    /* Gaya untuk modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    position: relative;
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    width: 50%;
    max-width: 600px;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-header {
    padding: 15px;
    border-bottom: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h5 {
    margin: 0;
    font-size: 1.25rem;
    color: #333;
}

.modal-header .close {
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #aaa;
    cursor: pointer;
}

.modal-header .close:hover {
    color: #333;
}

.modal-body {
    padding: 15px;
}

.modal-footer {
    padding: 15px;
    border-top: 1px solid #ddd;
    display: flex;
    justify-content: flex-end;
}

.modal-footer .btn {
    margin-left: 10px;
}

/* Gaya untuk modal yang bisa digerakkan */
.draggable {
    cursor: move;
}
    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 15px;
    }

    .form-group {
        flex: 1;
        margin: 0 10px;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    .modal-footer {
        border-top: none;
        padding: 20px;
        display: flex;
        justify-content: flex-end;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border: none;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }

        .form-group {
            margin: 0;
        }

        .modal-dialog {
            margin: 10px;
        }
    }
</style>
<div class="content" style="background-color: #000; margin-bottom: 50px;">
    <div class="dashboard-wrapper" style="border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5); padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-left: 20px; margin-top: 50px;">
        <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Daftar Karyawan</h1>

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Tambah Karyawan Button -->
        <a href="<?php echo site_url('dashboard/add_karyawan'); ?>" class="btn btn-primary mb-4">Tambah Karyawan</a>

        <!-- Search Form -->
        <form id="searchForm" class="mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div style="flex: 1; margin-right: 20px;">
                <input type="text" class="form-control" id="searchInputKaryawan" placeholder="Cari nama atau posisi karyawan" onkeyup="searchKaryawan()" 
                    style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; width: 100%; box-sizing: border-box;">
            </div>
            <div style="text-align: left;">
                <button type="button" class="btn btn-success" onclick="printAllDataKaryawan()" 
                    style="background-color: orange; color: white; padding: 10px 20px; border-radius: 5px; border: none; font-size: 16px; cursor: pointer;"> 
                    <i class="fas fa-print"></i> Cetak Semua Data
                </button>
            </div>
        </form>

        <!-- Advanced Filter Section -->
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); max-width: 1200px; margin: auto;">
            <h3 style="font-size: 20px; font-weight: bold; text-align: center; color: black;">Filter Data Karyawan</h3>
            <div style="width: 100%; height: 2px; background-color: #000; margin-bottom: 20px;"></div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
                <!-- Posisi Filter -->
                <div style="display: flex; flex-direction: column;">
                    <label for="posisiFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Posisi</label>
                    <select id="posisiFilter" onchange="applyFilters()" 
                        style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                        <option value="">Semua Posisi</option>
                        <option value="Kasir">Kasir</option>
                        <option value="Koki">Koki</option>
                        <option value="Manajer">Manajer</option>
                        <option value="Pelayan">Pelayan</option>
                    </select>
                </div>

                <!-- Status Karyawan Filter -->
                <div style="display: flex; flex-direction: column;">
                    <label for="statusFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Status Karyawan</label>
                    <select id="statusFilter" onchange="applyFilters()" 
                        style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                        <option value="">Semua Status</option>
                        <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>

            <!-- Jenis Kelamin Filter -->
            <div style="display: flex; flex-direction: column;">
                <label for="jenisKelaminFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Jenis Kelamin</label>
                <select id="jenisKelaminFilter" onchange="applyFilters()" 
                    style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px; background-color: #fff; transition: all 0.3s;">
                    <option value="">Semua</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

          <!-- Gaji Min Filter -->
<div style="display: flex; flex-direction: column;">
    <label for="gajiMinFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Gaji Minimum</label>
    <input type="number" id="gajiMinFilter" onchange="applyFilters()" placeholder="Gaji Min (angka saja)"
        style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px;">
</div>

<!-- Gaji Max Filter -->
<div style="display: flex; flex-direction: column;">
    <label for="gajiMaxFilter" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Gaji Maksimum</label>
    <input type="number" id="gajiMaxFilter" onchange="applyFilters()" placeholder="Gaji Maks (angka saja)"
        style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px;">
</div>
            <!-- Tanggal Masuk Dari -->
            <div style="display: flex; flex-direction: column;">
                <label for="startDate" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Tanggal Masuk Dari</label>
                <input type="date" id="startDate" onchange="applyFilters()" 
                    style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px;">
            </div>

            <!-- Tanggal Masuk Hingga -->
            <div style="display: flex; flex-direction: column;">
                <label for="endDate" style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 8px;">Tanggal Masuk Hingga</label>
                <input type="date" id="endDate" onchange="applyFilters()" 
                    style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; font-size: 14px;">
            </div>
        </div>

        <!-- Reset Button -->
        <div style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 15px;">
            <button onclick="resetFilters()" 
                style="background-color: #6c757d; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer; transition: background-color 0.3s;">
                <i class="fas fa-undo"></i> Reset Filter
            </button>
        </div>
    </div>

    <!-- Tabel Karyawan -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered" id="karyawanTable">
        <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">ID Karyawan</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Posisi</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">No Telepon</th>
                <th style="text-align: center;">Tanggal Masuk</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Gaji</th>
                <th style="text-align: center;">Jenis Kelamin</th>
                <th style="text-align: center;">Alamat</th>
                <th style="text-align: center;">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($karyawan)): ?>
                <?php foreach ($karyawan as $k): ?>
                    <tr id="row_karyawan<?php echo $k->id_karyawan; ?>" class="karyawan-row">
                        <td style="text-align: center;"><?php echo $k->id_karyawan; ?></td>
                        <td style="text-align: center;"><?php echo $k->nama; ?></td>
                        <td style="text-align: center;"><?php echo $k->posisi; ?></td>
                        <td style="text-align: center;"><?php echo $k->email; ?></td>
                        <td style="text-align: center;"><?php echo $k->no_telepon; ?></td>
                        <td style="text-align: center;"><?php echo $k->tanggal_masuk; ?></td>
                        <td style="text-align: center;">
                            <span style="background-color: <?php echo ($k->status_karyawan == 'Aktif') ? '#5CB338' : 'red'; ?>; 
                                padding: 10px; font-size:14px; border-radius: 10px;">
                                <?php echo $k->status_karyawan; ?>
                            </span>
                        </td>
                        <td style="text-align: center;"><?php echo 'Rp. ' . number_format($k->gaji, 0, ',', '.'); ?></td>
                        <td style="text-align: center;"><?php echo $k->jenis_kelamin; ?></td>
                        <td style="text-align: center;"><?php echo $k->alamat; ?></td>
                        <td style="text-align: center; padding: 10px;">
                            <div class="btn-group" role="group" style="display: flex; gap: 5px; justify-content: center;">
                                <!-- Edit Button -->
                                <button type="button"
                                        class="btn btn-sm" 
                                        onclick="editKaryawan(<?php echo $k->id_karyawan; ?>)" 
                                        style="background-color: #28a745;
                                               color: white;
                                               border: none;
                                               padding: 8px 12px;
                                               border-radius: 4px;
                                               transition: all 0.3s ease;
                                               display: inline-flex;
                                               align-items: center;
                                               gap: 5px;">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </button>

                                <!-- Delete Button -->
                                <button type="button"
                                        class="btn btn-sm" 
                                        onclick="deleteKaryawan(<?php echo $k->id_karyawan; ?>)" 
                                        style="background-color: #dc3545;
                                               color: white;
                                               border: none;
                                               padding: 8px 12px;
                                               border-radius: 4px;
                                               transition: all 0.3s ease;
                                               display: inline-flex;
                                               align-items: center;
                                               gap: 5px;">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11" class="text-center">Tidak ada data karyawan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div>



<!-- Modal Edit Karyawan -->
<div class="modal fade" id="editKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="editKaryawanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header draggable" style="background-color: #007bff; color: white; border-bottom: none; border-radius: 10px;">
                <h5 class="modal-title" id="editKaryawanModalLabel"><i class="fas fa-edit"></i> Edit Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <form id="editKaryawanForm" action="<?php echo site_url('dashboard/do_edit_karyawan'); ?>" method="POST">
                    <input type="hidden" name="id_karyawan" id="id_karyawan">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="posisi">Posisi</label>
                        <select id="posisi" name="posisi" class="form-control" required>
                            <option value="Kasir">Kasir</option>
                            <option value="Koki">Koki</option>
                            <option value="Manajer">Manajer</option>
                            <option value="Pelayan">Pelayan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="text" id="no_telepon" name="no_telepon" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="status_karyawan">Status Karyawan</label>
                        <select id="status_karyawan" name="status_karyawan" class="form-control" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="gaji">Gaji</label>
                        <input type="number" id="gaji" name="gaji" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Karyawan -->
<div class="modal fade" id="deleteKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="deleteKaryawanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ddd; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="modal-header draggable" style="background-color: #f8d7da; border-bottom: none; color: #721c24; font-weight: bold; border-radius: 10px;">
                <h5 class="modal-title" id="deleteKaryawanModalLabel"><i class="fas fa-trash-alt"></i> Hapus Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 20px; font-size: 16px; color: #333; text-align: center;">
                <p>Apakah Anda yakin ingin menghapus karyawan ini?</p>
            </div>
            <div class="modal-footer" style="display: flex; justify-content: center; padding: 20px;">
                <button type="button" class="btn btn-danger" id="confirmDeleteKaryawanBtn" style="background-color: #dc3545; color: white; border-radius: 30px; font-size: 16px; padding: 10px 20px; transition: background-color 0.3s ease;">Hapus</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
function applyFilters() {
    const rows = document.querySelectorAll('.karyawan-row');
    const posisiFilter = document.getElementById('posisiFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const jenisKelaminFilter = document.getElementById('jenisKelaminFilter').value;
    const gajiMinFilter = parseFloat(document.getElementById('gajiMinFilter').value) || 0; // Default 0 jika kosong
    const gajiMaxFilter = parseFloat(document.getElementById('gajiMaxFilter').value) || Infinity; // Default Infinity jika kosong
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    rows.forEach(row => {
        const posisi = row.querySelector('td:nth-child(3)').textContent;
        const status = row.querySelector('td:nth-child(7)').textContent.trim();
        const jenisKelamin = row.querySelector('td:nth-child(9)').textContent.trim();
        const gajiText = row.querySelector('td:nth-child(8)').textContent;
        const gaji = parseFloat(gajiText.replace(/[^0-9]/g, '')); // Hapus semua karakter non-angka
        const tanggalMasuk = row.querySelector('td:nth-child(6)').textContent;

        let show = true;

        // Posisi Filter
        if (posisiFilter && posisi !== posisiFilter) show = false;

        // Status Filter
        if (statusFilter && status !== statusFilter) show = false;

        // Jenis Kelamin Filter
        if (jenisKelaminFilter && jenisKelamin !== jenisKelaminFilter) show = false;

        // Gaji Filter
        if (gaji < gajiMinFilter || gaji > gajiMaxFilter) show = false;

        // Tanggal Masuk Filter
        if (startDate && tanggalMasuk < startDate) show = false;
        if (endDate && tanggalMasuk > endDate) show = false;

        row.style.display = show ? '' : 'none';
    });
}

function resetFilters() {
    document.getElementById('posisiFilter').value = '';
    document.getElementById('statusFilter').value = '';
    document.getElementById('jenisKelaminFilter').value = '';
    document.getElementById('gajiMinFilter').value = '';
    document.getElementById('gajiMaxFilter').value = '';
    document.getElementById('startDate').value = '';
    document.getElementById('endDate').value = '';
    
    const rows = document.querySelectorAll('.karyawan-row');
    rows.forEach(row => row.style.display = '');
}

function editKaryawan(id) {
    // Ambil data dari baris yang dipilih
    const row = document.getElementById('row_karyawan' + id);
    const cells = row.querySelectorAll('td');

    // Bersihkan tanda titik dari gaji
    const gajiText = cells[7].textContent; // Misalnya: "Rp. 7.200.000"
    const gajiClean = gajiText.replace(/[^0-9]/g, ''); // Hapus semua karakter non-angka

    // Isi form edit dengan data yang sesuai
    document.getElementById('id_karyawan').value = id;
    document.getElementById('nama').value = cells[1].textContent;
    document.getElementById('posisi').value = cells[2].textContent;
    document.getElementById('email').value = cells[3].textContent;
    document.getElementById('no_telepon').value = cells[4].textContent;
    document.getElementById('tanggal_masuk').value = cells[5].textContent;
    document.getElementById('status_karyawan').value = cells[6].textContent.trim();
    document.getElementById('gaji').value = gajiClean; // Masukkan gaji yang sudah dibersihkan
    document.getElementById('jenis_kelamin').value = cells[8].textContent.trim();
    document.getElementById('alamat').value = cells[9].textContent;

    // Tampilkan modal edit
    $('#editKaryawanModal').modal('show');
}

function searchKaryawan() {
    const keyword = document.getElementById('searchInputKaryawan').value.toLowerCase();
    const rows = document.querySelectorAll('.karyawan-row');

    rows.forEach(row => {
        const nama = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const posisi = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        
        row.style.display = (nama.includes(keyword) || posisi.includes(keyword)) ? '' : 'none';
    });
}

function printAllDataKaryawan() {
    let table = document.getElementById('karyawanTable');

if (table) {
    // Clone tabel untuk menghindari modifikasi tabel asli
    let printTable = table.cloneNode(true);
    
    // Hapus kolom terakhir dari thead
    let headers = printTable.querySelectorAll('th');
    if (headers.length > 0) {
        headers[headers.length - 1].remove();
    }
    
    // Hapus kolom terakhir dari setiap baris
    let rows = printTable.getElementsByTagName('tr');
    for (let row of rows) {
        let cells = row.getElementsByTagName('td');
        if (cells.length > 0) {
            cells[cells.length - 1].remove();
        }
    }

    let currentDate = new Date().toLocaleString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    let printWindow = window.open('', '', 'height=600,width=800');
    let content = `
        <html>
        <head>
            <title>Laporan Data Karyawan</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                body {
                    font-family: 'Segoe UI', Arial, sans-serif;
                    padding: 40px;
                    background-color: #f8f9fa;
                }
                .report-container {
                    background-color: white;
                    border-radius: 15px;
                    padding: 30px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                    margin: 0 auto;
                }
                .report-header {
                    text-align: center;
                    margin-bottom: 30px;
                    padding-bottom: 20px;
                    border-bottom: 2px solid #e9ecef;
                }
                .report-title {
                    font-size: 24px;
                    font-weight: 600;
                    color: #2c3e50;
                    margin-bottom: 10px;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                }
                .report-date {
                    color: #6c757d;
                    font-size: 14px;
                    font-style: italic;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                th {
                    background: linear-gradient(45deg, #2193b0, #6dd5ed);
                    color: white;
                    font-weight: 500;
                    padding: 12px 15px;
                    text-transform: uppercase;
                    font-size: 14px;
                    letter-spacing: 0.5px;
                }
                td {
                    padding: 12px 15px;
                    border-bottom: 1px solid #e9ecef;
                    color: #2d3436;
                }
                tr:nth-child(even) {
                    background-color: #f8f9fa;
                }
                tr:hover {
                    background-color: #f1f3f4;
                }
                .footer {
                    margin-top: 30px;
                    text-align: right;
                    font-size: 12px;
                    color: #6c757d;
                }
                @media print {
                    body {
                        background-color: white;
                        padding: 20px;
                    }
                    .report-container {
                        box-shadow: none;
                        padding: 0;
                    }
                    th {
                        background: #f8f9fa !important;
                        color: #000 !important;
                    }
                    tr:nth-child(even) {
                        background-color: #f8f9fa !important;
                    }
                    td, th {
                        border: 1px solid #ddd !important;
                    }
                }
            </style>
        </head>
        <body>
            <div class="report-container">
                <div class="report-header">
                    <h1 class="report-title">Laporan Data Karyawan</h1>
                    <div class="report-date">Dicetak pada: ${currentDate}</div>
                </div>
                
                ${printTable.outerHTML}
                
                <div class="footer">
                    * Laporan ini digenerate secara otomatis
                </div>
            </div>
        </body>
        </html>
    `;

    printWindow.document.write(content);
    printWindow.document.close();
    printWindow.print();
} else {
    console.error("Tabel karyawan tidak ditemukan!");
}
}


function deleteKaryawan(id) {
    $('#deleteKaryawanModal').modal('show');
    $('#confirmDeleteKaryawanBtn').attr('onclick', `confirmDeleteKaryawan(${id})`);
}

function confirmDeleteKaryawan(id) {
    window.location.href = '<?php echo site_url("dashboard/delete_karyawan/"); ?>' + id;
}

// Fungsi untuk membuat modal bisa digerakkan
function makeDraggable(modal) {
    const header = modal.querySelector('.modal-header.draggable');
    const content = modal.querySelector('.modal-content');
    let isDragging = false;
    let offsetX, offsetY;

    header.addEventListener('mousedown', (e) => {
        isDragging = true;
        offsetX = e.clientX - content.getBoundingClientRect().left;
        offsetY = e.clientY - content.getBoundingClientRect().top;
    });

    document.addEventListener('mousemove', (e) => {
        if (isDragging) {
            const x = e.clientX - offsetX;
            const y = e.clientY - offsetY;
            content.style.left = `${x}px`;
            content.style.top = `${y}px`;
        }
    });

    document.addEventListener('mouseup', () => {
        isDragging = false;
    });
}

// Terapkan fungsi draggable pada modal edit dan delete
document.addEventListener('DOMContentLoaded', () => {
    const editModal = document.getElementById('editKaryawanModal');
    const deleteModal = document.getElementById('deleteKaryawanModal');

    if (editModal) makeDraggable(editModal);
    if (deleteModal) makeDraggable(deleteModal);
});
</script>