    <div class="content"
        style="font-family: 'Arial', sans-serif; background-color: #000; padding: 20px; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start;">
        
        <div class="container"
            style="width: 100%; max-width: 1200px; display: flex; flex-direction: column; gap: 30px;">
            <!-- Form Tambah Data -->
            <div class="card"
                style="width: 100%; background: #000; border-radius: 15px; overflow: hidden; border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5);">
                <div class="card-header"
                    style="background: linear-gradient(135deg, #f39c12, #e67e22); color: #fff; padding: 23px; text-align: center;">
                    <h4 style="margin: 0; font-size: 28px;">Tambah Admin</h4>
                </div>
                <div class="card-body" style="padding: 50px; background-color: #000; color: #fff;">
                    <form action="<?= base_url('dashboard/add_admin') ?>" method="POST">
                        <!-- Username -->
                        <div style="margin-bottom: 25px;">
                            <label for="username"
                                style="font-size: 18px; font-weight: bold; display: block; margin-bottom: 8px; color: #f39c12;">Username</label>
                            <input type="text" id="username" name="username" placeholder="Masukkan Username"
                                style="width: 100%; padding: 15px; border: none; background: #1e1e1e; color: #fff; border-radius: 5px; font-size: 16px;"
                                required>
                        </div>
                        <!-- Password -->
                        <div style="margin-bottom: 25px;">
                            <label for="password"
                                style="font-size: 18px; font-weight: bold; display: block; margin-bottom: 8px; color: #f39c12;">Password</label>
                            <input type="password" id="password" name="password" placeholder="Masukkan Password"
                                style="width: 100%; padding: 15px; border: none; background: #1e1e1e; color: #fff; border-radius: 5px; font-size: 16px;"
                                required>
                        </div>
                        <!-- Role -->
                        <div style="margin-bottom: 25px;">
                            <label for="role"
                                style="font-size: 18px; font-weight: bold; display: block; margin-bottom: 8px; color: #f39c12;">Role</label>
                            <select id="role" name="role"
                                style="width: 100%; padding: 15px; border: none; background: #1e1e1e; color: #fff; border-radius: 5px; font-size: 16px;"
                                required>
                                <option value="superadmin">Super Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>
                        <!-- Submit Button -->
                        <div class="card-footer"
                            style="background: #000; padding: 30px; text-align: center; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            <button type="submit"
                                style="text-decoration: none; background: #f39c12; color: #fff; padding: 15px 40px; border-radius: 8px; font-size: 18px; font-weight: bold; transition: background 0.3s ease-in-out; border: none; cursor: pointer;">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Data Admin -->
            <div class="card"
                style="width: 100%; background: #000; border-radius: 15px; overflow: hidden; margin-bottom: 50px; border-left: 3px solid red; box-shadow: 5px 0 10px rgba(255, 0, 0, 0.5);">
                <div class="card-header"
                    style="background: linear-gradient(135deg, #f39c12, #e67e22); color: #fff; padding: 23px; text-align: center;">
                    <h4 style="margin: 0; font-size: 28px;">Daftar Admin</h4>
                </div>
                <div class="card-body" style="padding: 30px; background-color: #000; color: #fff;">
                    <!-- Form Pencarian -->
        <form id="searchForm" class="mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div style="flex: 1; margin-right: 20px;">
                <input type="text" class="form-control" id="searchInputAdmin" placeholder="Cari berdasarkan username atau role..." onkeyup="searchAdmin()" 
                    style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; width: 100%; box-sizing: border-box;">
            </div>
            <div>
                <!-- Tombol Print Semua Data -->
                <button type="button" class="btn btn-success" onclick="printAllDataAdmin()" 
                    style="background-color: orange; color: white; padding: 10px 20px; border-radius: 5px; border: none; font-size: 16px; cursor: pointer;"> 
                    <i class="fas fa-print"></i> Cetak Semua Data
                </button>
            </div>
        </form>
                    <table style="width: 100%; border-collapse: collapse;" id="adminTable">
                        <thead>
                            <tr style="background: #1e1e1e; color: #f39c12; text-align: left;">
                                <th style="padding: 15px; border-bottom: 2px solid #444;">No</th>
                                <th style="padding: 15px; border-bottom: 2px solid #444;">Username</th>
                                <th style="padding: 15px; border-bottom: 2px solid #444;">Role</th>
                                <th style="padding: 15px; border-bottom: 2px solid #444;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($admins as $admin): ?>
                            <tr style="background: #1e1e1e; color: #fff;">
                                <td style="padding: 15px; border-bottom: 1px solid #444;"><?= $no++ ?></td>
                                <td style="padding: 15px; border-bottom: 1px solid #444;"><?= $admin['username'] ?></td>
                                <td style="padding: 15px; border-bottom: 1px solid #444;"><?= $admin['role'] ?></td>
                                <td style="padding: 15px; border-bottom: 1px solid #444;">
                                    <!-- Button Edit -->
                                    <button class="btn-edit" data-id="<?= $admin['id'] ?>" data-username="<?= $admin['username'] ?>" data-role="<?= $admin['role'] ?>" style="color: #fff; background-color: #ffc107; border-color: #ffc107;"
                                        ><i class="fas fa-edit"  ></i> Edit</button>
                                    <!-- Button Delete -->
                                    <button class="btn-delete" data-id="<?= $admin['id'] ?>" 
                                    style="color: #fff; background-color: #ff0000; border-color: #ff0000;"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit Admin -->
    <div class="modal" id="editModal" tabindex="-1" role="dialog" style="display:none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #1e1e1e; color: #fff;">
                        <div class="modal-header" style="background: #f39c12; color: white;">
                            <h5 class="modal-title">Edit Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:rgb(254, 0, 0);">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" method="POST" action="<?= base_url('dashboard/update_admin') ?>">
                                <input type="hidden" id="edit-id" name="id">
                                <div class="form-group">
                                    <label for="edit-username">Username</label>
                                    <input type="text" class="form-control" id="edit-username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-role">Role</label>
                                    <select class="form-control" id="edit-role" name="role" required>
                                        <option value="superadmin">Super Admin</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Delete Admin -->
            <div class="modal" id="deleteModal" tabindex="-1" role="dialog" style="display:none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #1e1e1e; color: #fff;">
                        <div class="modal-header" style="background: #e74c3c; color: white;">
                            <h5 class="modal-title">Hapus Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #e74c3c;;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus admin ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <a href="" id="confirm-delete" class="btn btn-danger" style="color: #e74c3c; text-decoration:none;">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
        // Fungsi untuk menampilkan modal Edit
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const adminId = this.getAttribute('data-id');
                const username = this.getAttribute('data-username');
                const role = this.getAttribute('data-role');
                
                // Isi form dengan data admin
                document.getElementById('edit-id').value = adminId;
                document.getElementById('edit-username').value = username;
                document.getElementById('edit-role').value = role;
                
                // Tampilkan modal
                $('#editModal').modal('show');
            });
        });

        // Fungsi untuk menampilkan modal Delete
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const adminId = this.getAttribute('data-id');
                
                // Set link untuk hapus
                document.getElementById('confirm-delete').setAttribute('href', `<?= base_url('dashboard/delete_admin/') ?>${adminId}`);
                
                // Tampilkan modal
                $('#deleteModal').modal('show');
            });
        });


        function printAllDataAdmin() {
        let table = document.getElementById('adminTable');

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
                    <title>Laporan Data Admin</title>
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
                            background-color: white; /* Set background to white */
                        }
                        th, td {
                            padding: 12px 15px;
                            border: 1px solid #ddd; /* Add borders */
                            color: #2d3436;
                            background-color: white; /* Ensure background is white for both headers and cells */
                        }
                        tr:nth-child(even) {
                            background-color: white !important; /* Override alternating colors */
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
                                background: white !important; /* Set header background to white */
                                color: #000 !important;
                            }
                            tr:nth-child(even) {
                                background-color: white !important; /* Override alternating colors for print */
                            }
                            td, th {
                                border: 1px solid #ddd !important;
                                background-color: white !important; /* Ensure all backgrounds are white */
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="report-container">
                        <div class="report-header">
                            <h1 class="report-title">Laporan Data Admin</h1>
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
            console.error("Tabel admin tidak ditemukan!");
        }
    }

    function searchAdmin() {
                let input = document.getElementById('searchInputAdmin').value.toLowerCase();
                let table = document.getElementById('adminTable');
                let rows = table.getElementsByTagName('tr');

                // Looping melalui baris tabel dan menyembunyikan baris yang tidak sesuai dengan pencarian
                for (let i = 1; i < rows.length; i++) {
                    let cells = rows[i].getElementsByTagName('td');
                    let username = cells[1].textContent.toLowerCase();
                    let role = cells[2].textContent.toLowerCase();
        
                    if (username.indexOf(input) > -1 || role.indexOf(input) > -1) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }

    </script>

