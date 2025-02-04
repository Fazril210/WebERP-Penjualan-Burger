<!-- application/views/kasir/add.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan Baru</title>
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Halaman Kasir</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('kasir') ?>">Kembali ke Daftar Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('auth/logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center">Tambah Pesanan Baru</h2>

        <!-- Form Tambah Pesanan -->
        <?php echo form_open('kasir/do_add'); ?>
        
        <div class="mb-3">
            <label for="id_customers" class="form-label">Customer</label>
            <select class="form-control" id="id_customers" name="id_customers" required>
                <option value="">Pilih Customer</option>
                <?php foreach ($customers as $customer): ?>
                    <option value="<?= $customer->id_customers ?>"><?= $customer->name_customers ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_items" class="form-label">Items</label>
            <select class="form-control" id="id_items" name="id_items" required>
                <option value="">Pilih Item</option>
                <?php foreach ($items as $item): ?>
                    <option value="<?= $item->id_items ?>"><?= $item->name_items ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <input type="text" class="form-control" id="payment_method" name="payment_method" required>
        </div>

        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" required>
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">Unit Price</label>
            <input type="text" class="form-control" id="unit_price" name="unit_price" required>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input type="date" class="form-control" id="order_date" name="order_date" required>
        </div>

        <div class="mb-3">
            <label for="total_price" class="form-label">Total Price</label>
            <input type="text" class="form-control" id="total_price" name="total_price" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
        <?php echo form_close(); ?>
    </div>

    <!-- Menambahkan Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>