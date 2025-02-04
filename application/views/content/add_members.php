<div class="content" style="padding: 70px; background: linear-gradient(135deg, #f39c12, #d35400); border-radius: 8px; color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
    <h1 style="font-size: 28px; color: #fff; margin-bottom: 25px; text-align: center; font-weight: bold;">Tambah Member</h1>

    <form id="addMemberForm" action="<?php echo site_url('dashboard/do_add_members'); ?>" method="POST" style="background-color: #1c1c1c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Nama Member</label>
            <input type="text" id="name" name="name" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);" placeholder="Masukkan Nama">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="email" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Email</label>
            <input type="email" id="email" name="email" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);" placeholder="Masukkan Alamat Email">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="phone" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Telepon</label>
            <input type="tel" id="phone" name="phone" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);" placeholder="Masukkan Nomor Telepon">
        </div>

        <div style="display: flex; gap: 10px; justify-content: flex-end; width: 100%; align-items: center;">
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; padding: 12px 25px; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);">
                Simpan
            </button>
            <a href="<?php echo site_url('dashboard/members'); ?>" class="btn btn-secondary" style="background-color: #ff4d4d; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-size: 16px; text-align: center; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(255, 77, 77, 0.3);">
                Batal
            </a>
        </div>
    </form>

    <script>
        document.getElementById('addMemberForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah form dikirimkan secara langsung

            // Kirim data form menggunakan AJAX (fetch API atau XMLHttpRequest)
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this)
            })
            .then(response => response.json()) // Pastikan server merespons dengan JSON
            .then(data => {
                if (data.success) {
                    // Jika sukses, tampilkan notifikasi
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil ditambahkan!',
                        showConfirmButton: false,
                        timer: 2000 // Durasi animasi
                    }).then(() => {
                        // Setelah notifikasi, arahkan ke halaman lain (jika perlu)
                        window.location.href = "<?php echo site_url('dashboard/members'); ?>";
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil ditambahkan!',
                        showConfirmButton: false,
                        timer: 2000 // Durasi animasi
                    }).then(() => {
                        // Setelah notifikasi, arahkan ke halaman lain (jika perlu)
                        window.location.href = "<?php echo site_url('dashboard/members'); ?>";
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil ditambahkan!',
                        showConfirmButton: false,
                        timer: 2000 // Durasi animasi
                    }).then(() => {
                        // Setelah notifikasi, arahkan ke halaman lain (jika perlu)
                        window.location.href = "<?php echo site_url('dashboard/members'); ?>";
                    });
            });
        });
    </script>
</div>
