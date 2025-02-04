<!-- Teks BUCKUP di luar sidebar -->
<div class="header-brand" id="headerBrand" style="position: fixed; top: 0; left: -1%; background-color: #000; width: 17.1%; transition: width 0.3s ease, opacity 0.3s ease, transform 0.3s ease;">
    <h2 id="buckupText" style="color: #F3881C; font-size: 50px; text-shadow: -4px 4px 6.3px #FF0000; font-family: 'Anton', sans-serif; margin-left:25px; margin-top: 10px; transition: opacity 0.3s ease, transform 0.3s ease;">BUCKUP</h2>
</div>

<style>
    .sidebar {
    background-color: #F3881C;
    padding: 20px;
    height: 100vh; /* Tinggi penuh viewport */
    color: #fff;
    margin-top: 70px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 12.1%;
    position: fixed;
    left: 0;
    transition: left 0.3s ease;
    overflow-y: scroll; /* Tetap bisa di-scroll secara vertikal */
    scrollbar-width: none; /* Hilangkan scrollbar untuk Firefox */
    border-top-right-radius: 20px; /* Radius untuk sisi kanan atas */
    border-bottom-right-radius: 20px; /* Radius untuk sisi kanan bawah */
}

/* Hilangkan scrollbar di Webkit-based browsers (Chrome, Safari) */
.sidebar::-webkit-scrollbar {
    display: none;
}

/* Menu Aktif */
.sidebar ul li a.active {
    background-color: #000; /* Background hitam */
    color: #fff; /* Warna teks putih */
    font-weight: bold;
    border-radius: 5px; /* Tambahkan radius jika perlu */
    padding: 20px; /* Tambahkan padding untuk tampilan lebih baik */
    display: flex;
    align-items: center;
    width: 150px;
    height: 20px;
}

/* Warna ikon aktif */
.sidebar ul li a.active i {
    color: #fff; /* Warna ikon putih */
}
/* Warna ikon aktif */
.sidebar ul li a.active span{
    color: #fff; /* Warna ikon putih */
}




</style>

<!-- Toggle Button -->
<button id="sidebarToggle" style="
    position: fixed;
    left: 12.1%;
    top: 14%;
    transform: translateY(-50%);
    z-index: 1000;
    background-color: #F3881C;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 0 5px 5px 0;
    transition: left 0.3s ease;
">
    <i id="toggleIcon" class="fas fa-chevron-left" style="color: #000;"></i>
</button>


<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <!-- Menu Atas -->
    <div>
        <ul style="list-style-type: none; padding: 0;">
        <li style="margin: 10px 0;">
                <span class="menu-text" style="color: #000; font-weight: bold; font-size: 14px;">BERANDA</span>
            </li>
            <!-- Beranda -->
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('dashboard'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard') ? 'active' : ''; ?>"  style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-home-alt" style="margin-right: 10px;"></i> 
                    <span class="menu-text">Beranda</span>
                </a>
            </li>

            <!-- Divider -->
            <li style="border-bottom: 2px solid #000; margin: 15px 0;"></li>

            <!-- Tambahkan ini di dalam <ul> di sidebar, di lokasi yang diinginkan -->
<li style="margin: 10px 0;">
    <span class="menu-text" style="color: #000; font-weight: bold; font-size: 14px;">LAPORAN & ANALISIS</span>
</li>
<li style="margin: 15px 0;">
    <a href="<?php echo site_url('dashboard/laporan_analisis'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard/laporan_analisis') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
        <i class="fas fa-chart-line" style="margin-right: 10px;"></i>
        <span class="menu-text">Laporan & Analisis</span>
    </a>
</li>
<!-- Divider -->
<li style="border-bottom: 2px solid #000; margin: 15px 0;"></li>
            
            <!-- Kategori Manajemen Produk -->
            <li style="margin: 10px 0;">
                <span class="menu-text" style="color: #000; font-weight: bold; font-size: 14px;">MANAJEMEN PRODUK</span>
            </li>
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('dashboard/items'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard/items') ? 'active' : ''; ?>"  style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-burger" style="margin-right: 10px;"></i>
                    <span class="menu-text">Produk</span>
                </a>
            </li>

            <!-- Divider -->
            <li style="border-bottom: 2px solid #000; margin: 15px 0;"></li>

            <!-- Kategori Inventaris -->
            <li style="margin: 10px 0;">
                <span class="menu-text" style="color: #000; font-weight: bold; font-size: 14px;">MANAJEMEN INVENTARIS</span>
            </li>
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('dashboard/products'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard/products') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-box-open" style="margin-right: 10px;"></i>
                    <span class="menu-text">Bahan Baku</span>
                </a>
            </li>
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('ingredients'); ?>" class="<?php echo ($this->uri->uri_string() == 'ingredients') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-utensils" style="margin-right: 10px;"></i>
                    <span class="menu-text">Ingredients</span>
                </a>
            </li>
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('dashboard/suppliers'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard/suppliers') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-truck" style="margin-right: 10px;"></i>
                    <span class="menu-text">Pemasok</span>
                </a>
            </li>
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('dashboard/transactions'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard/transactions') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-money-bill-wave" style="margin-right: 10px;"></i>
                    <span class="menu-text">Transaksi Bahan Baku</span>
                </a>
            </li>

            <!-- Divider -->
            <li style="border-bottom: 2px solid #000; margin: 15px 0;"></li>

            <!-- Kategori Pelanggan -->
            <li style="margin: 10px 0;">
                <span class="menu-text" style="color: #000; font-weight: bold; font-size: 14px;">MANAJEMEN PELANGGAN</span>
            </li>
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('dashboard/members'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard/members') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-users" style="margin-right: 10px;"></i>
                    <span class="menu-text">Member</span>
                </a>
            </li>

            <!-- Divider -->
            <li style="border-bottom: 2px solid #000; margin: 15px 0;"></li>

            
            <li style="margin: 10px 0;">
                <span class="menu-text" style="color: #000; font-weight: bold; font-size: 14px;">HRM</span>
            </li>
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('dashboard/profile'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard/profile') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-user" style="margin-right: 10px;"></i>
                    <span class="menu-text">Admin</span>
                </a>
            </li>
            <li style="margin: 15px 0;">
                <a href="<?php echo site_url('dashboard/karyawan'); ?>" class="<?php echo ($this->uri->uri_string() == 'dashboard/karyawan') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center;">
                    <i class="fas fa-users" style="margin-right: 10px;"></i>
                    <span class="menu-text">Karyawan</span>
                </a>
            </li>
            <li style="border-bottom: 2px solid #000; margin: 15px 0;"></li>
        </ul>
    </div>
    

    <!-- Menu Keluar -->
    <div>
        <ul style="list-style-type: none; padding: 0; margin: 0; margin-bottom: 50px;">
        <li style="margin: 10px 0;">
                <span class="menu-text" style="color: #000; font-weight: bold; font-size: 14px;">KELUAR</span>
            </li>
            <li style="margin: 15px 0;">
                <a href="javascript:void(0);" onclick="showLogoutModal()" class="<?php echo ($this->uri->uri_string() == 'showLogoutModal()') ? 'active' : ''; ?>" style="color: #000; text-decoration: none; font-size: 18px; display: flex; align-items: center; margin-bottom: 130px;">
                    <i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i>
                    <span class="menu-text">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Add this script section -->
<script>

    
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const headerBrand = document.getElementById('headerBrand');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const toggleIcon = document.getElementById('toggleIcon');
    const content = document.querySelector('.content'); // Selektor untuk konten utama
    const buckupText = document.getElementById('buckupText');
    let sidebarVisible = true;

    function toggleSidebar() {
        if (sidebarVisible) {
            // Hide sidebar
            sidebar.style.left = '-17.1%';
            headerBrand.style.width = '0';
            headerBrand.style.opacity = '0';
            headerBrand.style.transform = 'translateX(-50%)';
            sidebarToggle.style.left = '0';
            content.style.marginLeft = '0'; 
            toggleIcon.classList.remove('fa-chevron-left');
            toggleIcon.classList.add('fa-chevron-right');

            // Animate BUCKUP text hide
            buckupText.style.opacity = '0';
            buckupText.style.transform = 'translateY(-20px)';
        } else {
            // Show sidebar
            sidebar.style.left = '0';
            headerBrand.style.width = '17.1%';
            headerBrand.style.opacity = '1';
            headerBrand.style.transform = 'translateX(0)';
            sidebarToggle.style.left = '12.1%';
            content.style.marginLeft = '17.1%'; // Geser konten ke kanan
            toggleIcon.classList.remove('fa-chevron-right');
            toggleIcon.classList.add('fa-chevron-left');

            // Animate BUCKUP text show
            buckupText.style.opacity = '1';
            buckupText.style.transform = 'translateY(0)';
        }
        sidebarVisible = !sidebarVisible;
    }

    sidebarToggle.addEventListener('click', toggleSidebar);
});
</script>


<!-- Modal Konfirmasi Logout (unchanged) -->
<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="modal" style="display: none;">
    <div class="modal-overlay" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
    ">
        <div class="modal-content" style="
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        ">
            <i class="fas fa-sign-out-alt" style="
                font-size: 50px;
                color: #d9534f;
                margin-bottom: 15px;
            "></i>
            <h3 style="
                margin: 10px 0;
                font-size: 24px;
                color: #333;
                font-weight: bold;
            ">Logout</h3>
            <p style="
                margin: 10px 0 20px;
                font-size: 16px;
                color: #666;
            ">
                Apakah Anda yakin ingin keluar dari aplikasi?
            </p>
            <div class="modal-actions" style="display: flex; justify-content: space-between; gap: 10px;">
                <button onclick="logout()" style="
                    background-color: #d9534f;
                    color: #fff;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    cursor: pointer;
                    flex: 1;
                    transition: background-color 0.3s ease;
                "
                onmouseover="this.style.backgroundColor='#c9302c'"
                onmouseout="this.style.backgroundColor='#d9534f'">
                    Logout
                </button>
                <button onclick="closeLogoutModal()" style="
                    background-color: #6c757d;
                    color: #fff;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    cursor: pointer;
                    flex: 1;
                    transition: background-color 0.3s ease;
                "
                onmouseover="this.style.backgroundColor='#5a6268'"
                onmouseout="this.style.backgroundColor='#6c757d'">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
