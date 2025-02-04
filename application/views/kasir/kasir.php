    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Buck Up</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

            

            <style>
                :root {
                    --primary-color: #ffc107;
                    --secondary-color: #212529;
                    --primary: #ffc107;
                --primary-dark: #e6ac00;
                --success: #198754;
                --info: #0dcaf0;
                --danger: #dc3545;
                --dark: #212529;
                --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
                --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
                --shadow-lg: 0 8px 15px rgba(0,0,0,0.1);
                --radius: 1rem;
                }

                body {  
                    min-height: 100vh;
                    background-color: #f8f9fa;
                    font-family: 'Poppins', sans-serif;
                }

                /* Tambahan style untuk tombol "Daftar Transaksi" & "Tambah Member" */
                /* Agar text color jadi putih dan border hilang */
                .btn[data-category="transaksi"] {
                    color: #fff !important;
                    border: none !important;
                    background: #074799;
                }
                .btn[data-category="member"] {
                    color: #fff !important;
                    border: none !important;
                    background: #5CB338;
                }

                .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #b02a37;
    }


                /* Floating Cart */
                .floating-cart {
    position: fixed;
    bottom: 20px; /* Kurangi jarak dari bawah */
    right: 20px; /* Pindahkan ke kanan */
    width: auto; /* Sesuaikan lebar */
    height: auto; /* Sesuaikan tinggi */
    padding: 15px 20px; /* Tambah padding untuk ukuran lebih besar */
    font-size: 1.5rem; /* Perbesar teks */
    color: white; /* Warna teks putih */
    background: #000; /* Warna latar sesuai tema */
    border-radius: 50px; /* Tetap bulat */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Tingkatkan bayangan */
    z-index: 1000; /* Pastikan tetap di atas elemen lain */
    cursor: pointer;
    transition: transform 0.3s ease, background 0.3s ease; /* Tambahkan transisi */
}

.floating-cart:hover {
    background: #000; /* Warna lebih terang saat hover */
    transform: scale(1.1); /* Tambahkan efek pembesaran */
}

.cart-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #dc3545; /* Warna merah terang */
    color: white;
    font-size: 1rem; /* Perbesar font badge */
    width: 30px; /* Perbesar ukuran badge */
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); /* Tambahkan bayangan badge */
    animation: pulse 1.5s infinite; /* Tambahkan animasi denyut */
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
}


.order-list {
    max-height: 300px;
    overflow-y: auto;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 15px;
    background: #fff;
}

.order-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #e9ecef;
}

.order-item:last-child {
    border-bottom: none;
}

.order-item h6 {
    font-size: 1rem;
    margin: 0;
    font-weight: 600;
}

.order-item small {
    color: #6c757d;
    display: block;
}

.order-total {
    font-size: 1.25rem;
    font-weight: bold;
    color: #dc3545;
    text-align: right;
    margin-top: 15px;
}

.modal-footer .btn {
    width: auto;
    min-width: 150px;
    font-size: 1rem;
    font-weight: bold;
}


                @media (max-width: 768px) {
                    .categories {
        flex-wrap: wrap; /* Bungkus elemen jika terlalu kecil */
        gap: 10px; /* Tambahkan jarak antar elemen */
    }

    .categories .d-flex {
        width: 100%; /* Elemen kiri dan kanan lebar penuh */
        justify-content: center; /* Pusatkan elemen */
    }

    .categories .form-control {
        width: 100%; /* Input memenuhi lebar */
    }

    .categories .btn {
        width: 100%; /* Tombol memenuhi lebar */
        text-align: center;
    }

                    .col-md-4 {
                        padding: 10px;
                    }

                    .menu-item img {
                        height: 250px; /* Slightly smaller on mobile */
                    }

                    .menu-item .card-body {
                        padding: 15px;
                    }
                }

                .modal-content {
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.modal-header {
    background: linear-gradient(135deg, #ffc107, #ff9800);
    color: white;
    font-weight: bold;
    text-align: center;
    padding: 20px;
    border-bottom: 2px solid #e0a800;
}

.modal-title {
    font-size: 1.5rem;
    letter-spacing: 1px;
    font-weight: 700;
}

.modal-body {
    background-color: #f8f9fa;
    padding: 20px;
    font-family: 'Poppins', sans-serif;
}

.modal-footer {
    background: #f1f1f1;
    padding: 15px;
    border-top: 2px solid #e0a800;
}



.modal-footer .btn-secondary {
    background-color: #6c757d;
    color: white;
    transition: all 0.3s ease-in-out;
}

.modal-footer .btn-secondary:hover {
    background-color: #5a6268;
}

.modal-footer .btn-warning {
    background-color: #ffc107;
    color: white;
    transition: all 0.3s ease-in-out;
}

.modal-footer .btn-warning:hover {
    background-color: #e0a800;
}




    @keyframes bounce {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
    }


    .quantity-controls {
    gap: 10px; /* Memberikan jarak antar elemen */
}

.quantity-input {
    width: 60px; /* Lebar input lebih konsisten */
    height: 40px; /* Ketinggian input selaras dengan tombol */
    font-size: 16px; /* Ukuran font lebih jelas */
    background-color: #fff;
    text-align: center;
}

.minus-btn, .plus-btn {
    width: 40px; /* Lebar tombol */
    height: 40px; /* Tinggi tombol */
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    padding: 0;
}

                .main-content {
                    flex: 1;
                    background-color: #f8f9fa;
                    min-height: 100vh;
                }

                .user-info {
    margin-bottom: 25px; /* Tambahkan jarak ke elemen di bawahnya */
    color: var(--primary-); /* Gunakan warna utama */
}

.user-info i {
    font-size: 2rem; /* Perbesar ikon */
}

.user-info span {
    font-size: 1.2rem; /* Perbesar teks */
    color: #ffc107; /* Gunakan warna putih */
}


                .categories {
                    z-index: 1000;
                    position: sticky;
                    top: 1%;
    background: #000; /* Latar belakang hitam */
    padding: 10px 30px; /* Tambahkan padding dalam elemen */
    border-radius: 8px; /* Membulatkan sudut */
    display: flex; /* Gunakan Flexbox untuk tata letak */
    justify-content: flex-start;
    flex-direction: column; 
    align-items: center; /* Vertikal sejajar */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan */
}

.categories .form-control {
    border: 2px solid #ffc107; /* Warna kuning untuk border */
    border-radius: 5px; /* Membulatkan sudut input */
    padding: 8px 12px; /* Jarak dalam input */
    width: 250px; /* Lebar tetap */
    transition: all 0.3s ease-in-out; /* Animasi saat fokus */
}

.categories .form-control:focus {
    border-color: #e0a800; /* Warna border saat fokus */
    outline: none;
}

.categories .btn {
    font-weight: 600; /* Tebalkan teks */
    padding: 13px 20px; /* Jarak tombol */
    border-radius: 5px; /* Membulatkan tombol */
    transition: all 0.3s ease; /* Animasi hover */
}

/* Tombol Daftar Transaksi */
.categories .btn[data-category="transaksi"] {
    background-color: #074799; /* Warna biru */
    border: none; /* Hilangkan border */
    color: #fff; /* Teks putih */
    font-weight: 600; /* Tebalkan teks */
    transition: all 0.3s ease-in-out; /* Transisi animasi */
}

.categories .btn[data-category="transaksi"]:hover {
    background-color: #043a63; /* Warna biru gelap untuk hover */
    color: #fff; /* Tetap putih */
}

/* Tombol Tambah Member */
.categories .btn[data-category="member"] {
    background-color: #5CB338; /* Warna hijau */
    border: none; /* Hilangkan border */
    color: #fff; /* Teks putih */
    font-weight: 600; /* Tebalkan teks */
    transition: all 0.3s ease-in-out; /* Transisi animasi */
}

.categories .btn[data-category="member"]:hover {
    background-color: #3e7a24; /* Warna hijau gelap untuk hover */
    color: #fff; /* Tetap putih */
}

/* Tombol Logout */
.categories .btn-danger {
    background-color: #dc3545; /* Warna merah */
    border: none; /* Hilangkan border */
    color: #fff; /* Teks putih */
    font-weight: 600; /* Tebalkan teks */
    transition: all 0.3s ease-in-out; /* Transisi animasi */
}

.categories .btn-danger:hover {
    background-color: #b02a37; /* Warna merah gelap untuk hover */
    color: #fff; /* Tetap putih */
}

.categories .btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.categories .btn-danger:hover {
    background-color: #b02a37;
}

.categories .btn-outline-warning {
    border: 2px solid #ffc107; /* Border kuning */
    color: #ffc107;
    background-color: transparent;
}

.categories .btn-outline-warning:hover {
    background-color: #ffc107;
    color: #000;
}

/* Mengatur jarak antar tombol */
.categories .d-flex .btn {
    margin: 0; /* Hilangkan margin bawaan */
}


                .menu-item {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
    }

    .menu-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .menu-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #f0f0f0;
    }

    .menu-item .card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex-grow: 1;
    }

    .menu-item .card-title {
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 1.25rem;
        color: #212529;
    }

    .menu-item .price-container {
        margin: 10px 0;
        font-size: 1rem;
        font-weight: bold;
    }

    .menu-item .price-container .text-danger {
        color: #ff5722;
    }

    .menu-item .stock-status {
        margin-top: 5px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #198754;
        text-transform: uppercase;
    }

    .menu-item .stock-status.out-of-stock {
        color: #dc3545;
    }

    .menu-item .quantity-controls {
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .menu-item .btn {
        border-radius: 50%;
        font-size: 0.9rem;
        font-weight: 700;
    }

    .quantity-input {
        border: none;
        background: #f8f9fa;
        width: 60px;
        text-align: center;
        font-weight: bold;
    }


                .row.g-4 {
                    margin-bottom: 30px;
                }

                .col-md-4 {
                    margin-bottom: 30px;
                }

                /* Tabel member */
                .table-dark th,
                .table-dark td {
                    vertical-align: middle;
                }

                .table-dark th {
                    background-color: #343a40;
                }

                .reports-container {
                padding: 2rem 1rem;
            }

            /* Filter Card */
            .filter-card {
                background: white;
                border-radius: var(--radius);
                box-shadow: var(--shadow-lg);
                border: none;
                margin-bottom: 2rem;
            }

            .filter-card .card-body {
                padding: 1.5rem;
            }

            .form-select {
                border-radius: 0.5rem;
                padding: 0.75rem;
                border-color: #e9ecef;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .form-select:hover {
                border-color: var(--primary);
            }

            .generate-btn {
                background: var(--gradient-primary);
                border: none;
                padding: 1rem;
                border-radius: 0.5rem;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .generate-btn:hover {
                transform: translateY(-2px);
                box-shadow: var(--shadow-md);
            }

            .btn:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }


            /* Analytics Cards */
            .analytics-card {
                border: none;
                border-radius: var(--radius);
                box-shadow: var(--shadow-md);
                transition: all 0.3s ease;
                height: 100%;
                overflow: hidden;
            }

            .analytics-card:hover {
                transform: translateY(-5px);
                box-shadow: var(--shadow-lg);
            }

            .analytics-card .card-body {
                padding: 1.5rem;
                position: relative;
                z-index: 1;
            }

            .analytics-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.2) 100%);
                z-index: 0;
            }

            .analytics-card .card-title {
                font-size: 0.875rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 1rem;
            }

            .analytics-card .card-text {
                font-size: 2rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
            }

            .analytics-card small {
                font-size: 0.875rem;
                opacity: 0.9;
            }

            /* Tables */
            .data-card {
                border: none;
                border-radius: var(--radius);
                box-shadow: var(--shadow-md);
                overflow: hidden;
                height: 100%;
            }

            .data-card .card-header {
                background: var(--gradient-primary);
                padding: 1rem 1.5rem;
                border: none;
            }

            .data-card .card-header h5 {
                margin: 0;
                color: var(--dark);
                font-weight: 600;
            }

            .table {
                margin: 0;
            }

            .table th {
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.75rem;
                letter-spacing: 0.5px;
                padding: 1rem;
                background: #000;
            }

            .table td {
                padding: 1rem;
                vertical-align: middle;
            }

            /* Chart */
            .chart-container {
                min-height: 300px;
                padding: 1rem;
            }

            /* Export Buttons */
            .export-card {
                border: none;
                border-radius: var(--radius);
                box-shadow: var(--shadow-md);
            }

            .export-btn {
                padding: 0.75rem 1.5rem;
                border-radius: 0.5rem;
                font-weight: 600;
                transition: all 0.3s ease;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
            }

            .export-btn:hover {
                transform: translateY(-2px);
                box-shadow: var(--shadow-sm);
            }

            .export-btn i {
                font-size: 1.25rem;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .reports-container {
                    padding: 1rem 0.5rem;
                }

                .analytics-card .card-text {
                    font-size: 1.5rem;
                }

                .export-btn {
                    width: 100%;
                    margin-bottom: 0.5rem;
                    justify-content: center;
                }
            }

            @media (max-width: 576px) {
        .categories .btn {
            width: 100%;
            margin-bottom: 10px;
        }
        .menu-item img {
            height: 200px; /* Kecilkan tinggi gambar */
        }
    }


    /* Member Section Styling */
#member-section h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #ffc107;
    margin-bottom: 20px;
}

#member-section table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0;
    border-radius: 6px;
    overflow: hidden;
}

#member-section thead tr {
    background-color: #2c2c2c;
    color: #ffc107;
    font-weight: 600;
    text-align: center;
}

#member-section thead th {
    padding: 12px 15px;
    font-size: 14px;
}

#member-section tbody tr {
    border-bottom: 2px solid #3a3a3a;
    text-align: center;
    font-weight: 500;
}

#member-section tbody td {
    padding: 12px 15px;
    color: #fff;
    font-size: 14px;
    text-align: center;
}

#member-section .btn-warning {
    background-color: #ffc107;
    border: none;
    font-weight: 600;
    color: #1a1a1a;
}

#member-section .btn-warning:hover {
    background-color: #e0a800;
    color: #fff;
}

#member-section .btn-danger {
    background-color: #dc3545;
    border: none;
    font-weight: 500;
    color: #fff;
    margin-left: 10px;
}

#member-section .btn-danger:hover {
    background-color: #b02a37;
    color: #fff;
}

#member-section .btn-primary {
    background-color: #007bff;
    border: none;
    font-weight: 500;
    color: #fff;
}

#member-section .btn-primary:hover {
    background-color: #0056b3;
    color: #fff;
}

.user-info {
    padding: 15px 30px;
    border-radius: 8px;
    background-color: rgba(255, 193, 7, 0.1);
    transition: all 0.3s ease;
    flex-direction: column; 
    align-items: center; 
}

.user-info:hover {
    background-color: rgba(255, 193, 7, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}   

@media print {
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f8f9fa;
    }
    .text-right {
        text-align: right;
    }
}
            </style>
        </head>
        <body>
            <div class="d-flex">

                <!-- Main Content -->
                <div class="main-content p-4">

                <div id="menu-section">
                <div class="categories mb-4 d-flex flex-column align-items-center">

    <!-- Bagian Kategori -->
    <div class="d-flex justify-content-between align-items-center w-100">
        <!-- Bagian Kiri -->
        <!-- Bagian Kiri -->
<div class="d-flex align-items-center gap-3">
    <!-- Search Bar -->
    <input 
        type="text" 
        id="menuSearch" 
        class="form-control" 
        placeholder="Cari menu..." 
    >
    <!-- Tombol Kategori -->
    <button class="btn btn-warning category-btn" data-category="Burger">
        <i class="fas fa-hamburger"></i> Burger
    </button>
    <button class="btn btn-outline-warning category-btn" data-category="Drinks">
        <i class="bi bi-cup"></i> Drinks
    </button>
    <button class="btn btn-outline-warning category-btn" data-category="Side Dish">
        <i class="bi bi-box"></i> Side Dish
    </button>
</div>

<!-- User Info -->
<div class="user-info d-flex align-items-center gap-2 ms-3">
    <i class="bi bi-person-circle" style="font-size: 2rem; color: #ffc107;"></i>
    <span style="font-size: 1.3rem; font-weight: 600; color: #ffc107;"><?php echo $this->session->userdata('username'); ?></span>
</div>

<!-- Bagian Kanan -->
<div class="d-flex align-items-center gap-3">
    <button class="btn btn-outline-warning category-btn" data-category="transaksi">
        <i class="bi bi-cash-coin"></i> Daftar Transaksi
    </button>
    <button class="btn btn-outline-warning category-btn" data-category="member">
        <i class="bi bi-people"></i> Daftar Member
    </button>
    <button class="btn btn-danger" id="logoutBtn">
        <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</div>
    </div>
</div>





                        <!-- Burger Section -->
                        <div class="menu-section" id="Burger-section">
                            <div class="row g-4">
                                <?php if(!empty($items['Burger'])): ?>
                                    <?php foreach($items['Burger'] as $item): ?>
                                        <div class="col-md-4">
        <div class="card menu-item">
            <img src="<?php echo base_url('assets/images/' . $item->images); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item->name_items); ?>">
            <div class="card-body text-center" data-id="<?= $item->id_items ?>">
                <h5 class="card-title"><?php echo htmlspecialchars($item->name_items); ?></h5>
                <p class="price-container text-danger">Rp <?php echo number_format($item->price_items, 0, ',', '.'); ?></p>
                <span class="stock-status <?php echo $item->stock_items == 0 ? 'out-of-stock' : ''; ?>">
                    <?php echo $item->stock_items > 0 ? 'Tersedia' : 'Habis'; ?>
                </span>
                <div class="quantity-controls d-flex justify-content-center align-items-center mt-3">
    <button class="btn btn-outline-danger minus-btn">-</button>
    <input 
        type="number" 
        class="form-control text-center quantity-input mx-2" 
        value="0" 
        min="0" 
        readonly>
    <button class="btn btn-outline-success plus-btn">+</button>
</div>

            </div>
        </div>
    </div>

                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-center">Tidak ada Burger yang tersedia.</p>
                                <?php endif; ?>
                            </div>
                        </div>

        <!-- Drinks Section -->
        <div class="menu-section" id="Drinks-section" style="display: none;">
                            <div class="row g-4">
                                <?php if(!empty($items['Drinks'])): ?>
                                    <?php foreach($items['Drinks'] as $item): ?>
                                        <div class="col-md-4">
        <div class="card menu-item">
            <img src="<?php echo base_url('assets/images/' . $item->images); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item->name_items); ?>">
            <div class="card-body text-center" data-id="<?= $item->id_items ?>">
                <h5 class="card-title"><?php echo htmlspecialchars($item->name_items); ?></h5>
                <p class="price-container text-danger">Rp <?php echo number_format($item->price_items, 0, ',', '.'); ?></p>
                <span class="stock-status <?php echo $item->stock_items == 0 ? 'out-of-stock' : ''; ?>">
                    <?php echo $item->stock_items > 0 ? 'Tersedia' : 'Habis'; ?>
                </span>
                <div class="quantity-controls d-flex justify-content-center align-items-center mt-3">
                    <button class="btn btn-outline-danger minus-btn">-</button>
                    <input type="number" class="form-control text-center quantity-input mx-2" value="0" min="0" readonly>
                    <button class="btn btn-outline-success plus-btn">+</button>
                </div>
            </div>
        </div>
    </div>

                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-center">Tidak ada Drinks yang tersedia.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Side Dish Section -->
                        <div class="menu-section" id="Side Dish-section" style="display: none;">
                            <div class="row g-4">
                                <?php if(!empty($items['Side Dish'])): ?>
                                    <?php foreach($items['Side Dish'] as $item): ?>
                                        <div class="col-md-4">
        <div class="card menu-item">
            <img src="<?php echo base_url('assets/images/' . $item->images); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item->name_items); ?>">
            <div class="card-body text-center" data-id="<?= $item->id_items ?>">
                <h5 class="card-title"><?php echo htmlspecialchars($item->name_items); ?></h5>
                <p class="price-container text-danger">Rp <?php echo number_format($item->price_items, 0, ',', '.'); ?></p>
                <span class="stock-status <?php echo $item->stock_items == 0 ? 'out-of-stock' : ''; ?>">
                    <?php echo $item->stock_items > 0 ? 'Tersedia' : 'Habis'; ?>
                </span>
                <div class="quantity-controls d-flex justify-content-center align-items-center mt-3">
                    <button class="btn btn-outline-danger minus-btn">-</button>
                    <input type="number" class="form-control text-center quantity-input mx-2" value="0" min="0" readonly>
                    <button class="btn btn-outline-success plus-btn">+</button>
                </div>
            </div>
        </div>
    </div>

                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-center">Tidak ada Side Dish yang tersedia.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Transaksi Section -->
                        <div class="menu-section" id="transaksi-section" style="padding: 20px; background-color: #1a1a1a; border-radius: 8px; margin: 15px; display: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; padding: 10px 0;">
        <h3 style="color: #ffc107; margin: 0; font-size: 24px; font-weight: 600;">Daftar Transaksi</h3>
        <div style="display: flex; align-items: center; gap: 10px;">
            <input 
                type="date" 
                id="dateFilter" 
                style="
                    background-color: #2c2c2c;
                    border: 1px solid #3a3a3a;
                    color: #fff;
                    padding: 8px 12px;
                    border-radius: 4px;
                    font-size: 14px;
                    outline: none;
                    transition: border-color 0.3s ease;
                "
                onmouseover="this.style.borderColor='#ffc107'"
                onmouseout="this.style.borderColor='#3a3a3a'"
            >
            <button id="printTransactionList" class="btn btn-warning">
            <i class="bi bi-printer"></i> Cetak Daftar Transaksi
        </button>
        </div>
    </div>

    <div style="overflow-x: auto; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <table style="width: 100%; border-collapse: collapse; background-color: #242424; color: #fff; min-width: 1000px;">
            <thead>
                <tr style="background-color: #2c2c2c; padding: 15px; border-bottom: 2px solid #3a3a3a; text-align: center; font-weight: 600; color: #ffc107;">
                    <th >No</th>
                    <th >Order ID</th>
                    <th >Tanggal</th>
                    <th >Nama Member</th>
                    <th >Total Awal</th>
                    <th >Diskon Member</th>
                    <th >Pajak</th>
                    <th>Total Akhir</th>
                    <th >Metode Pembayaran</th>
                    <th >Detail</th>
                </tr>
            </thead>
            <tbody id="transactionTableBody" style="font-size: 14px; padding: 15px; border-bottom: 2px solid #3a3a3a; text-align: center; font-weight: 600; color: #fff;">
                <!-- Data will be dynamically populated here -->
            </tbody>
        </table>
    </div>
</div>
    <!-- Transaction Details Modal -->
    <div class="modal fade" id="transactionDetailModal" tabindex="-1" aria-labelledby="transactionDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 800px;">
        <div class="modal-content" style="background-color: #242424; color: #fff; border-radius: 12px; border: 1px solid #333;">
            <div class="modal-header" style="background-color: #ffc107; padding: 15px 20px; border-bottom: 2px solid #e0a800; border-radius: 12px 12px 0 0;">
                <h5 class="modal-title" id="transactionDetailModalLabel" style="color: #000; font-size: 20px; font-weight: 600;">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none;"></button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div class="order-info" style="background-color: #2c2c2c; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <h6 style="margin-bottom: 10px; color: #ffc107;"><b>Order ID:</b> <span id="detailOrderId" style="color: #fff;"></span></h6>
                    <h6 style="margin-bottom: 10px; color: #ffc107;"><b>Member Name:</b> <span id="detailMemberName" style="color: #fff;"></span></h6>
                    <h6 style="margin-bottom: 0; color: #ffc107;"><b>Tanggal:</b> <span id="detailDate" style="color: #fff;"></span></h6>
                </div>
                <div style="overflow-x: auto; border-radius: 8px; background-color: #2c2c2c; padding: 15px; margin-bottom: 20px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid #3a3a3a; padding: 12px; color: #ffc107; font-weight: 600; text-align: left;">
                                <th>Item</th>
                                <th >Harga Satuan</th>
                                <th >Jumlah</th>
                                <th >Total</th>
                            </tr>
                        </thead>
                        <tbody id="detailTableBody" style="padding: 12px; color: #fff; font-weight: 600; text-align: left;">
                            <!-- Detail items will be populated here -->
                        </tbody>
                    </table>
                </div>
                <div class="price-summary" style="background-color: #2c2c2c; padding: 20px; border-radius: 8px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="color: #ddd;">Subtotal:</span>
                        <span id="detailSubtotal" style="font-family: monospace;"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="color: #ddd;">Diskon Member:</span>
                        <span id="detailDiscount" style="font-family: monospace; color: #28a745;"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <span style="color: #ddd;">Pajak:</span>
                        <span id="detailTax" style="font-family: monospace; color: #ff0000;"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding-top: 15px; border-top: 2px solid #3a3a3a;">
                        <span style="color: #ffc107; font-weight: bold;">Total Akhir:</span>
                        <span id="detailFinalTotal" style="font-family: monospace; font-weight: bold; font-size: 18px; color: #ffc107;"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #333; padding: 15px 20px; border-radius: 0 0 12px 12px;">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" 
        style="background-color: #6c757d; border: none; padding: 8px 20px; border-radius: 6px; color: #fff; font-weight: 500; transition: all 0.3s ease;"
        onmouseover="this.style.backgroundColor='#5a6268'" 
        onmouseout="this.style.backgroundColor='#6c757d'">
        Tutup
    </button>
    <button type="button" class="btn btn-warning" onclick="printTransactionDetail()">
    <i class="bi bi-printer"></i> Cetak
</button>
</div>
        </div>
    </div>
</div>

                    </div>

                    <!-- Member Section -->
<div class="menu-section" id="member-section" style="display: none; padding: 20px; background-color: #1a1a1a; border-radius: 8px; margin: 15px;">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 style="color: #ffc107; margin: 0; font-size: 24px; font-weight: 600;">Daftar Member</h3>
    <div class="d-flex gap-2">
        <button class="btn btn-warning d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addMemberModal">
            <i class="bi bi-plus-circle"></i> Tambah Member
        </button>
        <button class="btn btn-warning d-flex align-items-center gap-2" id="printMemberList" style="background:#007bff">
            <i class="bi bi-printer"></i> Cetak Daftar Member
        </button>
    </div>
</div>
    <div style="overflow-x: auto; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <table style="width: 100%; border-collapse: collapse; background-color: #242424; color: #fff; min-width: 1000px;">
            <thead>
                <tr style="background-color: #2c2c2c; padding: 15px; border-bottom: 2px solid #3a3a3a; text-align: center; font-weight: 600; color: #ffc107;">
                    <th style="padding: 12px 15px;">No</th>
                    <th style="padding: 12px 15px;">Nama</th>
                    <th style="padding: 12px 15px;">Email</th>
                    <th style="padding: 12px 15px;">Telepon</th>
                    <th style="padding: 12px 15px;">Aksi</th>
                </tr>
            </thead>
            <tbody id="memberTableBody" style="font-size: 14px; padding: 15px; border-bottom: 2px solid #3a3a3a; text-align: center; font-weight: 600; color: #fff;">
                <!-- Data member akan ditambahkan secara dinamis -->
            </tbody>
        </table>
    </div>
</div>



                </div>
            </div>



            <!-- Floating Cart -->
            <div class="floating-cart" id="floatingCart">
                <span class="cart-badge" id="cartBadge">0</span>
                <i class="bi bi-cart3"></i>
                <span class="ms-2">Lihat Keranjang</span>
            </div>

            <!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel"><i class="bi bi-cart3"></i> Pesanan Anda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="order-list" id="orderList">
                    <!-- Order items will be dynamically added here -->
                </div>
                <div class="order-total">
                    Total: <span id="orderTotal">Rp 0</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Tutup</button>
                <button type="button" class="btn btn-warning" id="paymentButton"><i class="bi bi-credit-card"></i> Lanjutkan ke Pembayaran</button>
            </div>
        </div>
    </div>
</div>


            <!-- Receipt Modal -->
            <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="receiptModalLabel">Receipt</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="receiptContent" class="font-monospace">
                                <div class="text-center mb-4">
                                    <h3 class="fw-bold">BUCK UP</h3>
                                    <p class="text-muted mb-1" id="receiptDateTime"></p>
                                    <p class="text-muted" id="receiptOrderNumber"></p>
                                </div>
                                
                                <div class="border-top border-2 border-dark my-3"></div>
                                
                                <div id="receiptItems"></div>
                                
                                <div class="border-top border-2 border-dark my-3"></div>
                                
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>TOTAL</span>
                                    <span id="receiptTotal"></span>
                                </div>
                                
                                <div class="text-center mt-4">
                                    <p class="mb-1">Thank you for dining with us!</p>
                                    <p>Please come again</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" onclick="printReceipt()">
                                <i class="bi bi-printer"></i> Print
                            </button>
                            <button type="button" class="btn btn-warning" onclick="finishOrder()">Done</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Member Modal -->
        <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addMemberForm">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="addMemberModalLabel">Tambah Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                            <div class="mb-3">
                                <label for="memberName" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="memberName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="memberEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="memberEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="memberPhone" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="memberPhone" name="phone" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


            <!-- Edit Member Modal -->
        <div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editMemberForm">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="editMemberModalLabel">Edit Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                            <input type="hidden" id="editMemberId" name="id_members">
                            <div class="mb-3">
                                <label for="editMemberName" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="editMemberName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="editMemberEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editMemberEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="editMemberPhone" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="editMemberPhone" name="phone" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


            <!-- Script -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


            <script>
function printTransactionDetail() {
    // Ambil data dari modal
    const orderId = document.getElementById('detailOrderId').textContent;
    const memberName = document.getElementById('detailMemberName').textContent;
    const orderDate = document.getElementById('detailDate').textContent;
    const detailTableBody = document.getElementById('detailTableBody').innerHTML;
    const subtotal = document.getElementById('detailSubtotal').textContent;
    const discount = document.getElementById('detailDiscount').textContent;
    const tax = document.getElementById('detailTax').textContent;
    const finalTotal = document.getElementById('detailFinalTotal').textContent;

    // Buat konten untuk dicetak
    const printContent = `
        <div style="font-family: Arial, sans-serif; padding: 20px;">
            <!-- Header -->
            <div style="text-align: center; margin-bottom: 20px;">
                <h2 style="color: #ffc107; margin: 0;">BUCK UP</h2>
                <p style="color: #666; margin: 5px 0;">Jl. Pramuka No.42, Kota Bekasi,Indonesia</p>
                <p style="color: #666; margin: 5px 0;">Telp: 0895-1243-5644</p>
            </div>

            <!-- Informasi Transaksi -->
            <div style="margin-bottom: 20px;">
                <h3 style="text-align: center; color: #333; margin-bottom: 10px;">Detail Transaksi</h3>
                <p style="margin: 5px 0;"><strong>Order ID:</strong> ${orderId}</p>
                <p style="margin: 5px 0;"><strong>Nama Member:</strong> ${memberName}</p>
                <p style="margin: 5px 0;"><strong>Tanggal:</strong> ${orderDate}</p>
            </div>

            <!-- Tabel Item -->
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                        <th style="padding: 10px; text-align: left;">Item</th>
                        <th style="padding: 10px; text-align: right;">Harga Satuan</th>
                        <th style="padding: 10px; text-align: right;">Jumlah</th>
                        <th style="padding: 10px; text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    ${detailTableBody}
                </tbody>
            </table>

            <!-- Ringkasan Harga -->
            <div style="margin-bottom: 20px;">
                <p style="margin: 5px 0;"><strong>Subtotal:</strong> ${subtotal}</p>
                <p style="margin: 5px 0;"><strong>Diskon Member:</strong> ${discount}</p>
                <p style="margin: 5px 0;"><strong>Pajak:</strong> ${tax}</p>
                <p style="margin: 5px 0;"><strong>Total Akhir:</strong> ${finalTotal}</p>
            </div>

            <!-- Footer -->
            <div style="text-align: center; margin-top: 20px; padding-top: 10px; border-top: 1px solid #ddd;">
                <p style="color: #666; margin: 5px 0;">Terima kasih telah berbelanja di BUCK UP!</p>
                <p style="color: #666; margin: 5px 0;">Silakan datang kembali.</p>
            </div>
        </div>
    `;

    // Buka jendela baru untuk mencetak
    const printWindow = window.open('', '', 'width=600,height=600');
    printWindow.document.write(`
        <html>
            <head>
                <title>Cetak Detail Transaksi</title>
                <style>
                    @media print {
                        body { font-family: Arial, sans-serif; }
                        table { width: 100%; border-collapse: collapse; }
                        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
                        th { background-color: #f8f9fa; }
                        .text-right { text-align: right; }
                        .text-center { text-align: center; }
                        .footer { margin-top: 20px; padding-top: 10px; border-top: 1px solid #ddd; }
                    }
                </style>
            </head>
            <body>
                ${printContent}
            </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

document.getElementById('printTransactionList').addEventListener('click', function () {
    // Ambil data transaksi dari tabel
    const transactionTableBody = document.getElementById('transactionTableBody');
    const transactions = Array.from(transactionTableBody.querySelectorAll('tr'))
        .map(row => Array.from(row.querySelectorAll('td')).map(td => td.textContent));

    if (transactions.length === 0) {
        Swal.fire({
            title: 'Tidak ada transaksi!',
            text: 'Pastikan ada transaksi yang dapat dicetak.',
            icon: 'info',
            confirmButtonColor: '#ffc107',
        });
        return;
    }

    // Buat konten cetak
    let printContent = `
        <div style="font-family: Arial, sans-serif; padding: 20px;">
            <div style="text-align: center; margin-bottom: 20px;">
                <h2 style="color: #ffc107; margin: 0;">BUCK UP</h2>
                <p style="color: #666; margin: 5px 0;">Jl. Pramuka No.42, Kota Bekasi, Indonesia</p>
                <p style="color: #666; margin: 5px 0;">Telp: 0895-1243-5644</p>
            </div>
            <h3 style="text-align: center; color: #333;">Daftar Transaksi</h3>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                        <th style="padding: 10px; text-align: left;">No</th>
                        <th style="padding: 10px; text-align: left;">Order ID</th>
                        <th style="padding: 10px; text-align: left;">Tanggal</th>
                        <th style="padding: 10px; text-align: left;">Nama Member</th>
                        <th style="padding: 10px; text-align: left;">Total Awal</th>
                        <th style="padding: 10px; text-align: left;">Diskon</th>
                        <th style="padding: 10px; text-align: left;">Pajak</th>
                        <th style="padding: 10px; text-align: left;">Total Akhir</th>
                        <th style="padding: 10px; text-align: left;">Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
    `;

    transactions.forEach((transaction, index) => {
        printContent += `
            <tr>
                <td style="padding: 10px; text-align: left;">${index + 1}</td>
                <td style="padding: 10px; text-align: left;">${transaction[1]}</td>
                <td style="padding: 10px; text-align: left;">${transaction[2]}</td>
                <td style="padding: 10px; text-align: left;">${transaction[3]}</td>
                <td style="padding: 10px; text-align: left;">${transaction[4]}</td>
                <td style="padding: 10px; text-align: left;">${transaction[5]}</td>
                <td style="padding: 10px; text-align: left;">${transaction[6]}</td>
                <td style="padding: 10px; text-align: left;">${transaction[7]}</td>
                <td style="padding: 10px; text-align: left;">${transaction[8]}</td>
            </tr>
        `;
    });

    printContent += `
                </tbody>
            </table>
            <div style="text-align: center; margin-top: 20px;">
                <p>Terima kasih telah menggunakan layanan kami!</p>
            </div>
        </div>
    `;

    // Buka jendela cetak
    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write(`
        <html>
            <head>
                <title>Cetak Daftar Transaksi</title>
                <style>
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                    th { background-color: #f8f9fa; }
                </style>
            </head>
            <body>${printContent}</body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
});

document.getElementById('printMemberList').addEventListener('click', function () {
    // Ambil data member dari tabel
    const memberTableBody = document.getElementById('memberTableBody');
    const members = Array.from(memberTableBody.querySelectorAll('tr'))
        .map(row => Array.from(row.querySelectorAll('td')).map(td => td.textContent));

    if (members.length === 0) {
        Swal.fire({
            title: 'Tidak ada member!',
            text: 'Pastikan ada member yang dapat dicetak.',
            icon: 'info',
            confirmButtonColor: '#ffc107',
        });
        return;
    }

    // Buat konten cetak
    let printContent = `
        <div style="font-family: Arial, sans-serif; padding: 20px;">
            <div style="text-align: center; margin-bottom: 20px;">
                <h2 style="color: #ffc107; margin: 0;">BUCK UP</h2>
                <p style="color: #666; margin: 5px 0;">Jl. Pramuka No.42, Kota Bekasi, Indonesia</p>
                <p style="color: #666; margin: 5px 0;">Telp: 0895-1243-5644</p>
            </div>
            <h3 style="text-align: center; color: #333;">Daftar Member</h3>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                        <th style="padding: 10px; text-align: left;">No</th>
                        <th style="padding: 10px; text-align: left;">Nama</th>
                        <th style="padding: 10px; text-align: left;">Email</th>
                        <th style="padding: 10px; text-align: left;">Telepon</th>
                    </tr>
                </thead>
                <tbody>
    `;

    members.forEach((member, index) => {
        printContent += `
            <tr>
                <td style="padding: 10px; text-align: left;">${index + 1}</td>
                <td style="padding: 10px; text-align: left;">${member[0]}</td>
                <td style="padding: 10px; text-align: left;">${member[1]}</td>
                <td style="padding: 10px; text-align: left;">${member[2]}</td>
            </tr>
        `;
    });

    printContent += `
                </tbody>
            </table>
            <div style="text-align: center; margin-top: 20px;">
                <p>Terima kasih telah menggunakan layanan kami!</p>
            </div>
        </div>
    `;

    // Buka jendela cetak
    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write(`
        <html>
            <head>
                <title>Cetak Daftar Member</title>
                <style>
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                    th { background-color: #f8f9fa; }
                </style>
            </head>
            <body>${printContent}</body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
});




                document.addEventListener('DOMContentLoaded', function () {
    const menuSearch = document.getElementById('menuSearch'); // Input pencarian
    const menuSections = document.querySelectorAll('.menu-section'); // Semua section menu

    // Fungsi pencarian menu
    function searchMenu() {
        const query = menuSearch.value.toLowerCase().trim(); // Ambil kata kunci pencarian
        let foundAny = false; // Menandai apakah ada menu yang cocok

        menuSections.forEach(section => {
            const menuItems = section.querySelectorAll('.menu-item'); // Semua item dalam section
            let hasMatch = false;

            menuItems.forEach(item => {
                const itemName = item.querySelector('.card-title').textContent.toLowerCase();

                if (itemName.includes(query)) {
                    item.style.display = 'block'; // Tampilkan item jika cocok
                    hasMatch = true;
                } else {
                    item.style.display = 'none'; // Sembunyikan item jika tidak cocok
                }
            });

            // Tampilkan atau sembunyikan seluruh section berdasarkan kecocokan
            section.style.display = hasMatch ? 'block' : 'none';
            if (hasMatch) foundAny = true;
        });

        // Tampilkan pemberitahuan jika tidak ada hasil
        if (!foundAny && query) {
            Swal.fire({
                title: 'Tidak ditemukan!',
                text: 'Menu dengan kata kunci tersebut tidak tersedia.',
                icon: 'info',
                confirmButtonColor: '#ffc107',
            });
        }
    }

    // Jalankan fungsi pencarian setiap kali ada perubahan pada input
    menuSearch.addEventListener('input', searchMenu);
});



            document.addEventListener('DOMContentLoaded', function() {
                const cart = {};
                const floatingCart = document.getElementById('floatingCart');
                const cartBadge = document.getElementById('cartBadge');
                const orderList = document.getElementById('orderList');
                const orderTotal = document.getElementById('orderTotal');
                const orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
                const logoutBtn = document.getElementById('logoutBtn');
                const paymentButton = document.getElementById('paymentButton');
                const categoryButtons = document.querySelectorAll('.category-btn');

                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default button behavior if any

                    Swal.fire({
                        title: 'Apakah Anda yakin untuk Logout?',
                        text: "Anda harus Login kembali untuk mengakses halaman ini!",
                        icon: 'warning', // You can use 'question', 'warning', 'error', 'success', 'info'
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545', // Bootstrap warning color
                        cancelButtonColor: '#727D73', // Bootstrap secondary color
                        confirmButtonText: '<i class="bi bi-box-arrow-right"></i> Logout',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to logout URL
                            window.location.href = "<?= base_url('kasir/logout') ?>";
                        }
                    });
                });

                // Inisialisasi event untuk plus/minus
                document.querySelectorAll('.plus-btn, .minus-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const container = this.closest('.card-body');
                        const input = container.querySelector('.quantity-input');
                        const itemName = container.querySelector('.card-title').textContent;
                        const itemId = container.getAttribute('data-id');
                        const priceText = container.querySelector('.text-danger').textContent;
                        const price = parseInt(priceText.replace(/\D/g, ''));

                        let value = parseInt(input.value);
                        if (this.classList.contains('plus-btn')) {
                            value++;
                        } else {
                            value = Math.max(0, value - 1);
                        }
                        input.value = value;

                        // Update cart
                        if (value > 0) {
                            cart[itemName] = {
                                id_items: itemId,
                                quantity: value,
                                price: price
                            };
                        } else {
                            // Jika 0, hapus dari cart
                            delete cart[itemName];
                        }

                        updateCartDisplay();
                    });
                });

                // Tampilkan floating cart jika ada item
                floatingCart.addEventListener('click', function() {
                    updateOrderModal();
                    orderModal.show();
                });

                // Fungsi untuk mengatur visibilitas floating cart
    function updateFloatingCartVisibility() {
        const activeSection = document.querySelector('.menu-section:not([style*="display: none"])');
        const excludedSections = ['member-section', 'transaksi-section',];

        if (activeSection && excludedSections.includes(activeSection.id)) {
            floatingCart.style.display = 'none';
        } else {
            const totalItems = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
            floatingCart.style.display = totalItems > 0 ? 'block' : 'none';
        }
    }

    // Tambahkan listener pada tombol kategori untuk mengatur ulang visibilitas
    categoryButtons.forEach(button => {
        button.addEventListener('click', updateFloatingCartVisibility);
    });

    // Validasi sebelum melanjutkan ke pembayaran
    paymentButton.addEventListener('click', function (e) {
        if (Object.keys(cart).length === 0) {
            e.preventDefault();
            Swal.fire({
                title: 'Keranjang Kosong!',
                text: 'Silakan tambahkan item ke keranjang sebelum melanjutkan ke pembayaran.',
                icon: 'warning',
                confirmButtonColor: '#ffc107',
                confirmButtonText: 'OK'
            });
        } else {
            proceedToPayment();
        }
    });

    updateFloatingCartVisibility();

                function updateCartDisplay() {
                    // Hitung total item
                    const totalItems = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
                    cartBadge.textContent = totalItems;
                    floatingCart.style.display = totalItems > 0 ? 'block' : 'none';

                    // Simpan cart ke localStorage (opsional)
                    localStorage.setItem('cart', JSON.stringify(cart));
                }

                function updateOrderModal() {
    orderList.innerHTML = '';
    let total = 0;

    Object.entries(cart).forEach(([name, details]) => {
        const itemTotal = details.price * details.quantity;
        total += itemTotal;

        const itemElement = `
            <div class="order-item">
                <div>
                    <h6>${name}</h6>
                    <small>Rp ${details.price.toLocaleString()} x ${details.quantity}</small>
                </div>
                <div>Rp ${itemTotal.toLocaleString()}</div>
            </div>
        `;
        orderList.innerHTML += itemElement;
    });

    orderTotal.textContent = `Rp ${total.toLocaleString()}`;
}


                // Category switching
            
    document.querySelectorAll('.category-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Ganti style tombol
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('btn-warning');
                btn.classList.add('btn-outline-warning');
            });

            // Kecuali tombol logout tidak diubah style-nya
            if (this.dataset.category !== 'logout') {
                this.classList.remove('btn-outline-warning');
                this.classList.add('btn-warning');
            }

            // Sembunyikan semua section
            document.querySelectorAll('.menu-section').forEach(section => {
                section.style.display = 'none';
            });

            // Tampilkan section sesuai data-category
            const category = this.dataset.category;
            if (category === 'reports') {
                document.getElementById('reports-section').style.display = 'block';
                // Trigger initial report load for current month
                const currentMonth = new Date().getMonth() + 1;
                const currentYear = new Date().getFullYear();
                loadMonthlyReport(currentMonth, currentYear);
            } else if (category !== 'logout') {
                document.getElementById(`${category}-section`).style.display = 'block';
            }
        });
    });




                // Redirect to payment page with cart data
    function proceedToPayment() {
        localStorage.setItem('cart', JSON.stringify(cart)); // Save cart to localStorage
        window.location.href = "<?= base_url('kasir/payment') ?>"; // Redirect to payment page
    }

    // Tambahkan event listener pada tombol "Proceed to Payment"
    document.getElementById('paymentButton').addEventListener('click', proceedToPayment);


                // --- CRUD Member Section ---

                const memberTableBody = document.getElementById('memberTableBody');
                const addMemberModalInstance = new bootstrap.Modal(document.getElementById('addMemberModal'));
                const editMemberModalInstance = new bootstrap.Modal(document.getElementById('editMemberModal'));
                const addMemberForm = document.getElementById('addMemberForm');
                const editMemberForm = document.getElementById('editMemberForm');

                // Fungsi untuk memuat dan menampilkan semua member
                // Load Members
        function loadMembers() {
            fetch('<?php echo base_url('kasir/get_members'); ?>')
                .then(response => {
                    console.log('Fetch response:', response);
                    return response.json();
                })
                .then(data => {
                    console.log('Members data:', data);
                    memberTableBody.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach((member, index) => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <th scope="row">${index + 1}</th>
                                <td>${member.name}</td>
                                <td>${member.email}</td>
                                <td>${member.phone}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-member-btn" data-id="${member.id_members}">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-member-btn" data-id="${member.id_members}">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            `;
                            memberTableBody.appendChild(row);
                        });
                    } else {
                        memberTableBody.innerHTML = `
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada member yang tersedia.</td>
                            </tr>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error fetching members:', error);
                    Swal.fire('Error!', 'Gagal memuat data members.', 'error');
                });
        }


                // Panggil loadMembers saat halaman dimuat
                loadMembers();

                // Handle Add Member Form Submission
                addMemberForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const name = document.getElementById('memberName').value.trim();
                    const email = document.getElementById('memberEmail').value.trim();
                    const phone = document.getElementById('memberPhone').value.trim();

                    if (name === '' || email === '' || phone === '') {
                        Swal.fire('Error!', 'Semua field harus diisi.', 'error');
                        return;
                    }

                    // Kirim data ke server menggunakan AJAX
                    const formData = new FormData(addMemberForm);
                    fetch('<?php echo base_url('kasir/add_member'); ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire('Berhasil!', data.message, 'success');
                            addMemberForm.reset();
                            addMemberModalInstance.hide();
                            loadMembers();
                        } else {
                            Swal.fire('Error!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error adding member:', error);
                        Swal.fire('Error!', 'Gagal menambahkan member.', 'error');
                    });
                });

                // Delegasi Event untuk Edit dan Delete Member
                memberTableBody.addEventListener('click', function(e) {
                    if (e.target.closest('.edit-member-btn')) {
                        const memberId = e.target.closest('.edit-member-btn').getAttribute('data-id');
                        editMember(memberId);
                    }

                    if (e.target.closest('.delete-member-btn')) {
                        const memberId = e.target.closest('.delete-member-btn').getAttribute('data-id');
                        deleteMember(memberId);
                    }
                });

                // Fungsi untuk mengedit member
                function editMember(id) {
            fetch('<?php echo base_url('kasir/get_member/'); ?>' + id, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'error') {
                    Swal.fire('Error!', data.message, 'error');
                    return;
                }

                const member = data.data;
                if (member && member.id_members) {
                    document.getElementById('editMemberId').value = member.id_members;
                    document.getElementById('editMemberName').value = member.name;
                    document.getElementById('editMemberEmail').value = member.email;
                    document.getElementById('editMemberPhone').value = member.phone;
                    editMemberModalInstance.show();
                } else {
                    Swal.fire('Error!', 'Member tidak ditemukan.', 'error');
                }
            })
            .catch(error => {
                console.error('Error fetching member:', error);
                Swal.fire('Error!', 'Gagal mendapatkan data member.', 'error');
            });
        }



                // Handle Edit Member Form Submission
                editMemberForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const id_members = document.getElementById('editMemberId').value;
                    const name = document.getElementById('editMemberName').value.trim();
                    const email = document.getElementById('editMemberEmail').value.trim();
                    const phone = document.getElementById('editMemberPhone').value.trim();

                    if (name === '' || email === '' || phone === '') {
                        Swal.fire('Error!', 'Semua field harus diisi.', 'error');
                        return;
                    }

                    // Kirim data ke server menggunakan AJAX
                    const formData = new FormData(editMemberForm);
                    fetch('<?php echo base_url('kasir/update_member'); ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire('Berhasil!', data.message, 'success');
                            editMemberForm.reset();
                            editMemberModalInstance.hide();
                            loadMembers();
                        } else {
                            Swal.fire('Error!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error updating member:', error);
                        Swal.fire('Error!', 'Gagal memperbarui member.', 'error');
                    });
                });

                // Fungsi untuk menghapus member
                function deleteMember(id) {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('<?php echo base_url('kasir/delete_member'); ?>/' + id, {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    Swal.fire('Dihapus!', data.message, 'success');
                                    loadMembers();
                                } else {
                                    Swal.fire('Error!', data.message, 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error deleting member:', error);
                                Swal.fire('Error!', 'Gagal menghapus member.', 'error');
                            });
                        }
                    });
                }

                // --- Akhir CRUD Member Section ---
            });


            // Add this to your existing script section
    document.addEventListener('DOMContentLoaded', function() {
        const transactionDetailModal = new bootstrap.Modal(document.getElementById('transactionDetailModal'));
        const dateFilter = document.getElementById('dateFilter');
        
        // Set default date to today
        const today = new Date().toISOString().split('T')[0];
        dateFilter.value = today;

        // Load transactions when date changes
        dateFilter.addEventListener('change', loadTransactions);

        // Initial load of transactions
        loadTransactions();

        function loadTransactions() {
            const selectedDate = dateFilter.value;
            fetch(`<?= base_url('kasir/get_transactions/') ?>${selectedDate}`)
                .then(response => response.json())
                .then(data => {
                    const tbody = document.getElementById('transactionTableBody');
                    tbody.innerHTML = '';

                    if (data.length === 0) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada transaksi pada tanggal ini</td>
                            </tr>
                        `;
                        return;
                    }

                    data.forEach((transaction, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td style="padding: 12px 15px;">${index + 1}</td>
                            <td style="padding: 12px 15px;">${transaction.id_order}</td>
                            <td style="padding: 12px 15px;">${formatDate(transaction.order_date)}</td>
                            <td>${transaction.member_name || 'Non-Member'}</td>
                            <td style="padding: 12px 15px;">Rp ${formatNumber(transaction.total_price)}</td>
                            <td style="padding: 12px 15px;">${formatNumber((transaction.member_discount * 100).toFixed(2))}%</td>
                            <td style="padding: 12px 15px;">${formatNumber((transaction.tax * 100).toFixed(2))}%</td>
                            <td style="padding: 12px 15px;">Rp ${formatNumber(transaction.final_price)}</td>
                            <td style="padding: 12px 15px;">${transaction.payment_method}</td>
                            <td style="padding: 12px 15px;">
                                <button class="btn btn-sm btn-warning view-detail-btn" 
                                        data-order-id="${transaction.id_order}">
                                    <i class="bi bi-eye"></i> Detail
                                </button>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });

                    // Add event listeners to detail buttons
                    document.querySelectorAll('.view-detail-btn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const orderId = this.getAttribute('data-order-id');
                            loadTransactionDetails(orderId);
                        });
                    });
                })
                .catch(error => {
                    console.error('Error loading transactions:', error);
                    Swal.fire('Error!', 'Gagal memuat data transaksi.', 'error');
                });
        }

        function loadTransactionDetails(orderId) {
            fetch(`<?= base_url('kasir/get_transaction_details/') ?>${orderId}`)
                .then(response => response.json())
                .then(data => {
                    // Update modal header information
                    document.getElementById('detailOrderId').textContent = data.order.id_order;
                    document.getElementById('detailMemberName').textContent = data.order.member_name || 'Non-Member';
                    document.getElementById('detailDate').textContent = formatDate(data.order.order_date);

                    // Update items table
                    const detailTableBody = document.getElementById('detailTableBody');
                    detailTableBody.innerHTML = '';

                    data.details.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.name_items}</td>
                            <td>Rp ${formatNumber(item.price)}</td>
                            <td>${item.quantity}</td>
                            <td>Rp ${formatNumber(item.price * item.quantity)}</td>
                        `;
                        detailTableBody.appendChild(row);
                    });

                    // Update price summary
                    document.getElementById('detailSubtotal').textContent = `Rp ${formatNumber(data.order.total_price)}`;
                    document.getElementById('detailDiscount').textContent = `${formatNumber((data.order.member_discount * 100).toFixed(2))}%`;
document.getElementById('detailTax').textContent = `${formatNumber((data.order.tax * 100).toFixed(2))}%`;

                    document.getElementById('detailFinalTotal').textContent = `Rp ${formatNumber(data.order.final_price)}`;

                    // Show modal
                    transactionDetailModal.show();
                })
                .catch(error => {
                    console.error('Error loading transaction details:', error);
                    Swal.fire('Error!', 'Gagal memuat detail transaksi.', 'error');
                });
        }

        function formatDate(dateString) {
            const options = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            return new Date(dateString).toLocaleString('id-ID', options);
        }

        function formatNumber(number) {
    // Konversi angka menjadi integer jika ada desimal, lalu format ribuan
    let formattedNumber = Math.floor(number).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    
    // Hilangkan dua angka nol di belakang koma jika ada
    if (formattedNumber.endsWith('.00')) {
        formattedNumber = formattedNumber.slice(0, -3);
    }
    
    return formattedNumber;
}
    });

    // Add to your existing script section
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Chart.js
        let salesChart;
        
        // Populate year dropdown
        const yearSelect = document.getElementById('reportYear');
        const currentYear = new Date().getFullYear();
        for (let year = currentYear; year >= currentYear - 5; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }

        // Set current month and year as default
        document.getElementById('reportMonth').value = new Date().getMonth() + 1;
        document.getElementById('reportYear').value = currentYear;

        // Generate Report Button Handler
        document.getElementById('generateReport').addEventListener('click', function() {
            const month = document.getElementById('reportMonth').value;
            const year = document.getElementById('reportYear').value;
            loadMonthlyReport(month, year);
        });

        // Export Handlers
        document.getElementById('exportExcel').addEventListener('click', function() {
            const month = document.getElementById('reportMonth').value;
            const year = document.getElementById('reportYear').value;
            exportToExcel(month, year);
        });

        document.getElementById('exportPDF').addEventListener('click', function() {
            const month = document.getElementById('reportMonth').value;
            const year = document.getElementById('reportYear').value;
            exportToPDF(month, year);
        });

        function loadMonthlyReport(month, year) {
        

            // Fetch report data
            fetch(`<?= base_url('kasir/get_monthly_report/') ?>${year}/${month}`)
                .then(response => response.json())
                .then(data => {
                    updateDashboardMetrics(data.summary);
                    updateTopProducts(data.topProducts);
                    updateSalesChart(data.dailySales);
                    Swal.close();
                });
        }

        function updateDashboardMetrics(summary) {
            // Update summary cards
            document.getElementById('totalSales').textContent = `Rp ${formatNumber(summary.totalSales)}`;
            document.getElementById('totalTransactions').textContent = summary.totalTransactions;
            document.getElementById('averageTransaction').textContent = `Rp ${formatNumber(summary.averageTransaction)}`;
            document.getElementById('totalDiscounts').textContent = `Rp ${formatNumber(summary.totalDiscounts)}`;

            // Update comparisons with previous month
            document.getElementById('salesComparison').textContent = 
                `${summary.salesGrowth > 0 ? '↑' : '↓'} ${Math.abs(summary.salesGrowth)}% vs last month`;
            document.getElementById('transactionsComparison').textContent = 
                `${summary.transactionsGrowth > 0 ? '↑' : '↓'} ${Math.abs(summary.transactionsGrowth)}% vs last month`;
            document.getElementById('averageComparison').textContent = 
                `${summary.averageGrowth > 0 ? '↑' : '↓'} ${Math.abs(summary.averageGrowth)}% vs last month`;
            document.getElementById('discountsComparison').textContent = 
                `${summary.discountsGrowth > 0 ? '↑' : '↓'} ${Math.abs(summary.discountsGrowth)}% vs last month`;
        }

        function updateTopProducts(products) {
        const tbody = document.getElementById('topProductsTable');
        tbody.innerHTML = '';

        products.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${product.name_items}</td>
                <td>${product.quantity_sold}</td>
                <td>Rp ${formatNumber(product.total_revenue)}</td>
            `;
            tbody.appendChild(row);
        }); 
    }

        function updateSalesChart(dailySales) {
            const ctx = document.getElementById('dailySalesChart').getContext('2d');
            
            // Destroy existing chart if it exists
            if (salesChart) {
                salesChart.destroy();
            }

            salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dailySales.map(item => item.date),
                    datasets: [{
                        label: 'Daily Sales',
                        data: dailySales.map(item => item.total),
                        borderColor: '#ffc107',
                        tension: 0.4,
                        backgroundColor: '#ffc107'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Daily Sales Trend'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + formatNumber(value);
                                }
                            }
                        }
                    }
                }
            });
        }


        document.getElementById('exportExcel').addEventListener('click', function () {
        const year = document.getElementById('reportYear').value; // Ambil nilai tahun
        const month = document.getElementById('reportMonth').value; // Ambil nilai bulan

        // Pastikan nilai tersedia
        if (!year || !month) {
            alert('Pilih tahun dan bulan sebelum melakukan ekspor.');
            return;
        }

        // Redirect ke endpoint
        window.location.href = `<?= base_url('kasir/export_report_excel/') ?>${year}/${month}`;
    });

    document.getElementById('exportPDF').addEventListener('click', function () {
        const year = document.getElementById('reportYear').value; // Ambil nilai tahun
        const month = document.getElementById('reportMonth').value; // Ambil nilai bulan

        // Pastikan nilai tersedia
        if (!year || !month) {
            alert('Pilih tahun dan bulan sebelum melakukan ekspor.');
            return;
        }

        // Redirect ke endpoint
        window.location.href = `<?= base_url('kasir/export_report_pdf/') ?>${year}/${month}`;
    });
    

    function formatNumber(number) {
    // Konversi angka menjadi integer jika ada desimal, lalu format ribuan
    return Math.floor(number).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}



    }); 

    
        </script>

        </body>
        </html>
            