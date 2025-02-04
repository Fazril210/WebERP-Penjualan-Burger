<div class="content" style="padding: 70px; background: linear-gradient(135deg, #f39c12, #d35400); border-radius: 8px; color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
    <h1 style="font-size: 28px; color: #fff; margin-bottom: 25px; text-align: center; font-weight: bold;">Tambah Karyawan</h1>

    <form action="<?php echo site_url('dashboard/do_add_karyawan'); ?>" method="POST" style="background-color: #1c1c1c; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="nama" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Nama Karyawan</label>
            <input type="text" id="nama" name="nama" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="posisi" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Posisi</label>
            <select id="posisi" name="posisi" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                <option value="" disabled selected>Semua Posisi</option>
                <option value="Kasir">Kasir</option>
                <option value="Koki">Koki</option>
                <option value="Manajer">Manajer</option>
                <option value="Pelayan">Pelayan</option>
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="email" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Email</label>
            <input type="email" id="email" name="email" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="no_telepon" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">No Telepon</label>
            <input type="tel" id="no_telepon" name="no_telepon" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="tanggal_masuk" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Tanggal Masuk</label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="status_karyawan" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Status Karyawan</label>
            <select id="status_karyawan" name="status_karyawan" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                <option value="" disabled selected>Pilih Status</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="gaji" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Gaji</label>
            <input type="number" id="gaji" name="gaji" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="jenis_kelamin" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="alamat" style="font-size: 16px; color: #f9f9f9; font-weight: bold; margin-bottom: 8px; display: block;">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" required
                style="width: 100%; padding: 12px; border: 1px solid #444; border-radius: 6px; font-size: 16px; background-color: #2c2c2c; color: #fff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);"></textarea>
        </div>

        <div style="display: flex; gap: 15px; justify-content: flex-end; width: 100%; align-items: center;">
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; padding: 12px 25px; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);">
                Simpan
            </button>
            <a href="<?php echo site_url('dashboard/karyawan'); ?>" class="btn btn-secondary" style="background-color: #ff4d4d; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-size: 16px; text-align: center; cursor: pointer; transition: background-color 0.3s ease; box-shadow: 0 4px 6px rgba(255, 77, 77, 0.3);">
                Batal
            </a>
        </div>
    </form>
</div>