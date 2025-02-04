    <!-- Footer -->
    <div class="footer">
                <p>&copy; 2025 Avid Burger | All Rights Reserved.</p>
            </div>
        </div>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

        <!-- JavaScript untuk Fungsi Sidebar dan Modal -->
        <script>
            function showLogoutModal() {
                document.getElementById("logoutModal").style.display = "block";
            }

            function closeLogoutModal() {
                document.getElementById("logoutModal").style.display = "none";
            }

            function logout() {
                window.location.href = "<?php echo site_url('dashboard/logout'); ?>";
            }

            window.onclick = function(event) {
                var modal = document.getElementById("logoutModal");
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // Fungsi untuk toggle sidebar (menyembunyikan dan menampilkan)
            function toggleSidebar() {
                var sidebar = document.getElementById('sidebar');
                if (sidebar.style.display === 'none') {
                    sidebar.style.display = 'block';
                } else {
                    sidebar.style.display = 'none';
                }
            }

            function filterByDate() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    
    const rows = document.querySelectorAll('#transactionTable tbody tr');
    
    rows.forEach(row => {
        const transactionDate = row.cells[3].innerText; // Tanggal transaksi ada di kolom ke-4 (indeks 3)
        
        // Cek apakah tanggal transaksi berada dalam rentang yang dipilih
        if ((startDate === "" || new Date(transactionDate) >= new Date(startDate)) &&
            (endDate === "" || new Date(transactionDate) <= new Date(endDate))) {
            row.style.display = ''; // Tampilkan baris jika memenuhi kriteria
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika tidak memenuhi kriteria
        }
    });
}

function resetDateFilter() {
    document.getElementById('startDate').value = '';
    document.getElementById('endDate').value = '';
    filterByDate(); // Reset filter dengan memanggil filterByDate
}

        </script>

    <script>

    // Fungsi untuk menghapus member
    function deleteMember(memberId) {
        // Menyimpan id member yang ingin dihapus ke dalam modal
        document.getElementById('confirmDeleteMemberBtn').onclick = function() {
            // Kirim request untuk menghapus member (misalnya melalui AJAX atau redirect ke controller)
            window.location.href = "<?php echo site_url('dashboard/do_delete_members/'); ?>" + memberId;
        };

        // Menampilkan modal delete
        $('#deleteMemberModal').modal('show');
    }

    function deleteEmployee(employeeId) {
        // Menyimpan id member yang ingin dihapus ke dalam modal
        document.getElementById('confirmDeleteEmployeeBtn').onclick = function() {
            // Kirim request untuk menghapus member (misalnya melalui AJAX atau redirect ke controller)
            window.location.href = "<?php echo site_url('dashboard/delete_employee/'); ?>" + employeeId;
        };

        // Menampilkan modal delete
        $('#deleteEmployeeModal').modal('show');
    }

    function deleteSupplier(supplierId) {
        // Menyimpan id supplier yang ingin dihapus ke dalam modal
        document.getElementById('confirmDeleteSupplierBtn').onclick = function() {
            // Kirim request untuk menghapus supplier (misalnya melalui AJAX atau redirect ke controller)
            window.location.href = "<?php echo site_url('dashboard/do_delete_supplier/'); ?>" + supplierId;
        };

        // Menampilkan modal delete
        $('#deleteSupplierModal').modal('show');
    }

    function deleteProduct(productId) {
        // Menyimpan id product yang ingin dihapus ke dalam modal
        document.getElementById('confirmDeleteProductBtn').onclick = function() {
            // Kirim request untuk menghapus product (misalnya melalui AJAX atau redirect ke controller)
            window.location.href = "<?php echo site_url('dashboard/do_delete_product/'); ?>" + productId;
        };

        // Menampilkan modal delete
        $('#deleteProductModal').modal('show');
    }

    function deleteTransaction(transactionId) {
        // Menyimpan id product yang ingin dihapus ke dalam modal
        document.getElementById('confirmDeleteTransactionBtn').onclick = function() {
            // Kirim request untuk menghapus product (misalnya melalui AJAX atau redirect ke controller)
            window.location.href = "<?php echo site_url('dashboard/delete_transaction/'); ?>" + transactionId;
        };

        // Menampilkan modal delete
        $('#deleteTransactionModal').modal('show');
    }
    </script>
    <script>
        // Fungsi untuk menampilkan data member yang ingin diedit di dalam modal
        function editMember(memberId) {
            // Menggunakan AJAX untuk mengambil data member berdasarkan ID
            $.ajax({
        url: "<?php echo site_url('dashboard/get_members_by_id/'); ?>" + memberId,
        method: "GET",
        dataType: "json",
        success: function(response) {
            // Debug: Periksa data yang diterima dari server
            console.log(response);

            $('#id_members').val(response.id_members);
            $('#name').val(response.name);
            $('#email').val(response.email);
            $('#phone').val(response.phone);
            
            // Menampilkan modal
            $('#editMemberModal').modal('show');
        }
    });

        }

        // Fungsi untuk menampilkan data employee yang ingin diedit di dalam modal
        function editEmployee(employeeId) {
            // Menggunakan AJAX untuk mengambil data member berdasarkan ID
            $.ajax({
        url: "<?php echo site_url('dashboard/get_employee/'); ?>" + employeeId,
        method: "GET",
        dataType: "json",
        success: function(response) {
            // Debug: Periksa data yang diterima dari server
            console.log(response);

            $('#id_employee').val(response.id);
            $('#name').val(response.name);
            $('#position').val(response.position);
            
            // Menampilkan modal
            $('#editEmployeeModal').modal('show');
        }
    });

        }

        // Fungsi untuk menampilkan data supplier yang ingin diedit di dalam modal
        function editSupplier(supplierId) {
            // Menggunakan AJAX untuk mengambil data supplier berdasarkan ID
            $.ajax({
        url: "<?php echo site_url('dashboard/get_supplier_by_id/'); ?>" +supplierId,
        method: "GET",
        dataType: "json",
        success: function(response) {
            // Debug: Periksa data yang diterima dari server
            console.log(response);

            $('#supplier_id').val(response.id_suppliers);
            $('#name_suppliers').val(response.name_suppliers);
            $('#phone').val(response.phone);
            $('#alamat').val(response.alamat);
            
            // Menampilkan modal
            $('#editSupplierModal').modal('show');
        }
    });

        }


         // Fungsi untuk menampilkan data product yang ingin diedit di dalam modal
         function editProduct(productId) {
    // Temukan baris produk yang sesuai dengan ID
    const productRow = document.querySelector(`#row_product${productId}`);

    // Ambil data dari kolom tabel
    const productData = {
        id_produk: productId,
        name_product: productRow.querySelector('td:nth-child(1)').innerText, // Kolom 1: Nama Produk
        stock_and_unit: productRow.querySelector('td:nth-child(2)').innerText, // Kolom 2: Stok dan Satuan
        price_per_piece: productRow.querySelector('td:nth-child(3)').innerText.replace(/[^\d]/g, ''), // Kolom 3: Harga Satuan
        id_suppliers: productRow.dataset.supplierId || "", // Data supplier dari atribut dataset
    };

    // Pisahkan stok dan satuan dari kolom yang digabung
    const [stock, unit_of_goods] = productData.stock_and_unit.split(' ');

    // Isi form edit dengan data yang diambil
    document.querySelector('#id_produk').value = productData.id_produk;
    document.querySelector('#name_product').value = productData.name_product;
    document.querySelector('#stock').value = stock; // Isi stok
    document.querySelector('#unit_of_goods').value = unit_of_goods; // Isi satuan
    document.querySelector('#price_per_piece').value = productData.price_per_piece;

    // Setel dropdown supplier
    const supplierDropdown = document.querySelector('#id_suppliers');
    supplierDropdown.value = productData.id_suppliers; // Atur dropdown ke ID supplier produk

    // Tampilkan modal edit
    $('#editProductModal').modal('show');
}

         

// Fungsi untuk menampilkan data product yang ingin diedit di dalam modal
         function editTransaction(transactionId) {
    const transactionRow = document.querySelector(`#row_transaction${transactionId}`);
    const transactionData = {
    id_transaksi: transactionId,
    id_produk: transactionRow.dataset.produkId || "",
    name_product: transactionRow.dataset.nameProduct || "Tidak ada Produk",
    id_suppliers: transactionRow.dataset.suppliersId || "",
    name_suppliers: transactionRow.dataset.supplierName || "Tidak ada Supplier",
    jumlah_beli: transactionRow.querySelector('td:nth-child(4)').innerText,
    harga_satuan: transactionRow.querySelector('td:nth-child(5)').innerText.replace(/[^\d]/g, ''),
    total_harga: transactionRow.querySelector('td:nth-child(6)').innerText.replace(/[^\d]/g, ''),
    metode_pembayaran: transactionRow.querySelector('td:nth-child(7)').innerText,
    status_pembayaran: transactionRow.querySelector('td:nth-child(8)').innerText,
    tgl: transactionRow.querySelector('td:nth-child(9)').innerText,
};



    document.querySelector('#transaksi_id').value = transactionData.id_transaksi;
    document.querySelector('#id_produk').value = transactionData.id_produk;
    document.querySelector('#id_suppliers').value = transactionData.id_suppliers;
    document.querySelector('#jumlah_beli').value = transactionData.jumlah_beli;
    document.querySelector('#harga_satuan').value = transactionData.harga_satuan;
    document.querySelector('#total_harga').value = transactionData.total_harga;
    document.querySelector('#metode_pembayaran').value = transactionData.metode_pembayaran;
    document.querySelector('#status_pembayaran').value = transactionData.status_pembayaran;
    document.querySelector('#tgl').value = transactionData.tgl;
    
    $('#editTransactionModal').modal('show');
}

    </script>
    <script>

        // ============================
        // SECTION: MEMBER START
        // ============================

        // Fungsi untuk pencarian member
        function searchMember() {
            let input = document.getElementById('searchInputMember').value.toLowerCase();
            let table = document.getElementById('memberTable');
            let rows = table.getElementsByTagName('tr');

            // Looping melalui baris tabel dan menyembunyikan baris yang tidak sesuai dengan pencarian
            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                let name = cells[0].textContent.toLowerCase();
                let email = cells[1].textContent.toLowerCase();
                let phone = cells[2].textContent.toLowerCase();

                if (name.indexOf(input) > -1 || email.indexOf(input) > -1 || phone.indexOf(input) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

    // Fungsi untuk mencetak seluruh tabel
    function printAllDataMember() {
    let table = document.getElementById('memberTable');

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
                <title>Laporan Data Member</title>
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
                        <h1 class="report-title">Laporan Data Member</h1>
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
        console.error("Tabel member tidak ditemukan!");
    }
}
        // ============================
        // SECTION: MEMBER END
        // ============================


        // ============================
        // SECTION: SUPPLIER START
        // ============================

        // Fungsi untuk pencarian supplier
        function searchSupplier() {
            let input = document.getElementById('searchInputSupplier').value.toLowerCase();
            let table = document.getElementById('supplierTable');
            let rows = table.getElementsByTagName('tr');

            // Looping melalui baris tabel dan menyembunyikan baris yang tidak sesuai dengan pencarian
            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                let name = cells[0].textContent.toLowerCase();
                let phone = cells[1].textContent.toLowerCase();
                let alamat = cells[2].textContent.toLowerCase();

                if (name.indexOf(input) > -1 || phone.indexOf(input) > -1 || alamat.indexOf(input) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        function printRowDataSupplier(supplierId) {
    let row = document.getElementById('row_suppliers' + supplierId);

    if (row) {
        let cells = row.querySelectorAll('td');
        let supplierData = {
            name_suppliers: cells[0] ? cells[0].textContent.trim() : '',
            phone: cells[1] ? cells[1].textContent.trim() : '',
            alamat: cells[2] ? cells[2].textContent.trim() : '',
        };

        let printWindow = window.open('', '', 'height=600,width=800');

        let content = `
            <html>
            <head>
                <title>Cetak Data Supplier</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <style>
                    body {
                        font-family: 'Segoe UI', Arial, sans-serif;
                        padding: 30px;
                        background-color: #f8f9fa;
                    }
                    .card {
                        background-color: white;
                        border: none;
                        border-radius: 15px;
                        padding: 30px;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                        margin: 20px auto;
                        max-width: 500px;
                    }
                    .card-header {
                        background: linear-gradient(45deg, #2193b0, #6dd5ed);
                        color: white;
                        padding: 20px;
                        border-radius: 12px;
                        margin-bottom: 25px;
                        text-align: center;
                    }
                    .card-title {
                        font-size: 24px;
                        font-weight: 600;
                        margin: 0;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                    }
                    .info-group {
                        margin-bottom: 20px;
                        border-bottom: 1px solid #eee;
                        padding-bottom: 15px;
                    }
                    .info-label {
                        font-weight: 600;
                        color: #495057;
                        font-size: 14px;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                        margin-bottom: 5px;
                    }
                    .info-value {
                        font-size: 16px;
                        color: #212529;
                        margin-bottom: 0;
                    }
                    .footer {
                        text-align: center;
                        margin-top: 30px;
                        color: #6c757d;
                        font-size: 12px;
                    }
                    @media print {
                        body {
                            background-color: white;
                            padding: 0;
                        }
                        .card {
                            box-shadow: none;
                            margin: 0;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kartu Data Supplier</h3>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Nama Supplier</div>
                        <p class="info-value">${supplierData.name_suppliers}</p>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Nomor Telepon</div>
                        <p class="info-value">${supplierData.phone}</p>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Alamat</div>
                        <p class="info-value">${supplierData.alamat}</p>
                    </div>

                    <div class="footer">
                        Dicetak pada: ${new Date().toLocaleString('id-ID')}
                    </div>
                </div>
            </body>
            </html>
        `;

        printWindow.document.write(content);
        printWindow.document.close();
        printWindow.print();
    } else {
        console.error(`Baris dengan ID 'row_suppliers${supplierId}' tidak ditemukan!`);
    }
}


    // Fungsi untuk mencetak seluruh tabel
    function printAllDataSupplier() {
    let table = document.getElementById('supplierTable');

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
                <title>Laporan Data Supplier</title>
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
                        <h1 class="report-title">Laporan Data Supplier</h1>
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
        console.error("Tabel supplier tidak ditemukan!");
    }
}
        // ============================
        // SECTION: CUSTOMER END
        // ============================



        // ============================
        // SECTION: PRODUCT START
        // ============================

        // Fungsi untuk pencarian product
        function searchProduk() {
            let input = document.getElementById('searchInputProduct').value.toLowerCase();
            let table = document.getElementById('productTable');
            let rows = table.getElementsByTagName('tr');

            // Looping melalui baris tabel dan menyembunyikan baris yang tidak sesuai dengan pencarian
            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                let name = cells[0].textContent.toLowerCase();
                let unit_of_goods = cells[2].textContent.toLowerCase();
                let supplier = cells[4].textContent.toLowerCase();

                if (name.indexOf(input) > -1 || unit_of_goods.indexOf(input) > -1 || supplier.indexOf(input) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

    // Fungsi untuk mencetak data per baris
    function printRowDataProduk(productId) {
        // Ambil elemen baris berdasarkan ID
        let row = document.getElementById('row_product' + productId);

        if (row) {
            // Hapus kolom aksi dari baris sebelum mencetak
            let actionColumn = row.querySelector('td:last-child');
            if (actionColumn) {
                actionColumn.style.display = 'none'; // Menyembunyikan kolom aksi
            }

            // Dapatkan HTML dari baris yang ingin dicetak
            let content = row.outerHTML;

            // Buka jendela baru untuk mencetak
            let printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Cetak Data Produk</title>');
            printWindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">');
            printWindow.document.write('<style>td:last-child, th:last-child { display: none; }</style>'); // CSS inline untuk menyembunyikan kolom aksi
            printWindow.document.write('</head><body>');
            printWindow.document.write(content); // Tulis data yang akan dicetak
            printWindow.document.write('</body></html>');
            printWindow.document.close(); // Menutup dokumen
            printWindow.print(); // Melakukan proses print

            // Kembalikan tampilan kolom aksi setelah mencetak
            actionColumn.style.display = ''; // Menampilkan kembali kolom aksi
        } else {
            console.log("Baris dengan ID 'row_product" + productId + "' tidak ditemukan!");
        }
    }

    function printAllDataProduk() {
    let table = document.getElementById('productTable');

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
                <title>Laporan Data Bahan Baku</title>
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
                        <h1 class="report-title">Laporan Data Bahan Baku</h1>
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
        console.error("Tabel produk tidak ditemukan!");
    }
}
        // ============================
        // SECTION: CUSTOMER END
        // ============================



        // ============================
        // SECTION: INGREDIENTS START
        // ============================

        function searchIngredients() {
            let input = document.getElementById('searchInputIngredients').value.toLowerCase();
            let table = document.getElementById('ingredientsTable');
            let rows = table.getElementsByTagName('tr');

            // Looping melalui baris tabel dan menyembunyikan baris yang tidak sesuai dengan pencarian
            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                let menu = cells[1].textContent.toLowerCase();
                let material = cells[2].textContent.toLowerCase();

                if (menu.indexOf(input) > -1 || material.indexOf(input) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }


        function printAllDataIngredients() {
    let table = document.getElementById('ingredientsTable');

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
                <title>Laporan Data Ingredients</title>
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
                        <h1 class="report-title">Laporan Data Ingredients</h1>
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
        console.error("Tabel ingredients tidak ditemukan!");
    }
}














        // ============================
        // SECTION: INGREDIENTS END
        // ============================


        // ============================
        // SECTION: TRANSACTIONS START
        // ============================


        function searchTransaction() {
    const searchInput = document.getElementById('searchInputTransaction').value.toLowerCase();
    const table = document.getElementById('transactionTable');
    const rows = table.getElementsByClassName('transaction-row');

    for (let row of rows) {
        const productName = row.getElementsByTagName('td')[1].textContent.toLowerCase();
        const supplierName = row.getElementsByTagName('td')[2].textContent.toLowerCase();
        
        // Show row if either product name or supplier name matches the search
        if (productName.includes(searchInput) || supplierName.includes(searchInput)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}

function filterByDate() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const table = document.getElementById('transactionTable');
    const rows = table.getElementsByClassName('transaction-row');

    // Convert input dates to Date objects
    const start = startDate ? new Date(startDate) : null;
    const end = endDate ? new Date(endDate) : null;

    for (let row of rows) {
        const dateCell = row.getElementsByTagName('td')[8]; // Index 8 is the date column
        const rowDate = new Date(dateCell.textContent);
        
        // Skip if no dates are selected
        if (!start && !end) {
            row.style.display = '';
            continue;
        }

        // Check if date is within range
        let showRow = true;
        if (start && rowDate < start) showRow = false;
        if (end && rowDate > end) showRow = false;

        row.style.display = showRow ? '' : 'none';
    }
}

function resetDateFilter() {
    // Reset date inputs
    document.getElementById('startDate').value = '';
    document.getElementById('endDate').value = '';
    
    // Show all rows
    const table = document.getElementById('transactionTable');
    const rows = table.getElementsByClassName('transaction-row');
    for (let row of rows) {
        row.style.display = '';
    }
}

// Add event listeners when document loads
document.addEventListener('DOMContentLoaded', function() {
    // Add event listener for search input
    document.getElementById('searchInputTransaction').addEventListener('input', searchTransaction);
    
    // Add event listeners for date filters
    document.getElementById('startDate').addEventListener('change', filterByDate);
    document.getElementById('endDate').addEventListener('change', filterByDate);
});


        function printAllDataTransaction() {
    // Get the table data
    const table = document.getElementById('transactionTable');
    const rows = table.getElementsByTagName('tr');
    
    // Create a new window for printing
    const printWindow = window.open('', '', 'height=600,width=800');
    
    // Create the print content with styling
    const printContent = `
        <html>
        <head>
            <title>Laporan Transaksi Bahan Baku</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .header h1 {
                    margin: 0;
                    color: #333;
                }
                .header p {
                    margin: 5px 0;
                    color: #666;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: center;
                }
                th {
                    background-color: #f5f5f5;
                }
                .footer {
                    margin-top: 30px;
                    text-align: right;
                }
                @media print {
                    .no-print {
                        display: none;
                    }
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Laporan Data Transaksi Bahan Baku</h1>
                <p>Tanggal Cetak: ${new Date().toLocaleDateString('id-ID', { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric'
                })}</p>
            </div>
            <table>
                ${table.innerHTML}
            </table>
            <div class="footer">
                <p>Dicetak oleh: Admin</p>
            </div>
        </body>
        </html>
    `;

    // Write the content to the new window
    printWindow.document.write(printContent);
    
    // Remove action buttons from the print view
    const actionCells = printWindow.document.getElementsByTagName('td');
    for (let cell of actionCells) {
        if (cell.innerHTML.includes('button')) {
            cell.style.display = 'none';
        }
    }
    
    // Remove the action column header
    const headers = printWindow.document.getElementsByTagName('th');
    headers[headers.length - 1].style.display = 'none';

    // Close the document writing
    printWindow.document.close();

    // Add event listener for after content loads
    printWindow.onload = function() {
        // Trigger print
        printWindow.print();
        // Close the window after printing (optional)
        printWindow.onafterprint = function() {
            printWindow.close();
        };
    };
}



        function printRowDataTransaction(transactionId) {
    const row = document.querySelector(`#row_transaction${transactionId}`);
    if (!row) return;
    
    const data = {
        id: row.cells[0].textContent,
        productName: row.cells[1].textContent,
        supplierName: row.cells[2].textContent,
        quantity: row.cells[3].textContent,
        unitPrice: row.cells[4].textContent,
        totalPrice: row.cells[5].textContent,
        paymentMethod: row.cells[6].textContent,
        paymentStatus: row.cells[7].textContent.trim(),
        date: row.cells[8].textContent
    };

    const invoiceHTML = `
        <div id="invoice-print" style="max-width: 800px; margin: 0 auto; padding: 40px; font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #fff; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
            <!-- Header dengan Logo dan Info Perusahaan -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 40px; padding-bottom: 20px; border-bottom: 2px solid #f0f0f0;">
                <div style="flex: 1;">
                    <h1 style="color: #2c3e50; font-size: 28px; margin: 0;">${data.supplierName}</h1>
                    <p style="color: #7f8c8d; margin: 5px 0;">Jl. Raya Siliwangi No.6, RT.001/RW.004, Sepanjang Jaya, Kec. Rawalumbu</p>
                    <p style="color: #7f8c8d; margin: 5px 0;">Kota Bekasi, Jawa Barat 17114</p>
                    <p style="color: #7f8c8d; margin: 5px 0;">Telp: (021) 82400924</p>
                </div>
                <div style="text-align: right;">
                    <h2 style="color: #e74c3c; font-size: 32px; margin: 0;">INVOICE</h2>
                    <p style="color: #7f8c8d; margin: 5px 0; font-size: 16px;">#INV-${data.id}</p>
                </div>
            </div>

            <!-- Info Invoice dan Supplier -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 40px;">
                <div style="flex: 1;">
                    <h3 style="color: #2c3e50; margin-bottom: 15px;">Tagihan Untuk:</h3>
                    <div style="background: #f9f9f9; padding: 20px; border-radius: 5px;">
                        <h4 style="color: #2c3e50; margin: 0 0 10px 0;">BUCKUP</h4>
                        <p style="color: #7f8c8d; margin: 5px 0;">Supplier ID: SUP-${data.id}</p>
                    </div>
                </div>
                <div style="text-align: right;">
                    <div style="background: #f9f9f9; padding: 20px; border-radius: 5px;">
                        <p style="margin: 15px 0;"><strong>Tanggal Invoice:</strong> ${data.date}</p>
                        <p style="margin: 5px 0;"><strong>Status:</strong> 
                            <span style="
                                background-color: ${data.paymentStatus === 'Lunas' ? '#27ae60' : '#e74c3c'}; 
                                color: white; 
                                padding: 5px 10px; 
                                border-radius: 15px; 
                                font-size: 12px;"
                            >${data.paymentStatus}</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tabel Produk -->
            <div style="margin-bottom: 40px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #2c3e50; color: white;">
                            <th style="padding: 15px; text-align: left; border-radius: 5px 0 0 0;">Produk</th>
                            <th style="padding: 15px; text-align: center;">Jumlah</th>
                            <th style="padding: 15px; text-align: right;">Harga Satuan</th>
                            <th style="padding: 15px; text-align: right; border-radius: 0 5px 0 0;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #f8f9fa;">
                            <td style="padding: 15px; border-bottom: 1px solid #ddd;">${data.productName}</td>
                            <td style="padding: 15px; border-bottom: 1px solid #ddd; text-align: center;">${data.quantity}</td>
                            <td style="padding: 15px; border-bottom: 1px solid #ddd; text-align: right;">${data.unitPrice}</td>
                            <td style="padding: 15px; border-bottom: 1px solid #ddd; text-align: right;">${data.totalPrice}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="padding: 15px; text-align: right; font-weight: bold;">Total:</td>
                            <td style="padding: 15px; text-align: right; font-weight: bold; color: #e74c3c; font-size: 18px;">${data.totalPrice}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Informasi Pembayaran -->
            <div style="background-color: #f9f9f9; padding: 20px; border-radius: 5px; margin-bottom: 40px;">
                <h3 style="color: #2c3e50; margin: 0 0 15px 0;">Informasi Pembayaran</h3>
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <p style="margin: 5px 0;"><strong>Metode Pembayaran:</strong></p>
                        <p style="color: #7f8c8d;">${data.paymentMethod}</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div style="text-align: center; margin-top: 40px; padding-top: 20px; border-top: 2px solid #f0f0f0;">
                <p style="color: #7f8c8d; margin: 5px 0;">Terima kasih atas kepercayaan Anda</p>
                <p style="color: #7f8c8d; margin: 5px 0;">Untuk pertanyaan, silakan hubungi support@company.com</p>
            </div>
        </div>
    `;

    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
            <head>
                <title>Invoice #${data.id}</title>
                <meta charset="UTF-8">
            </head>
            <body style="background-color: #f0f0f0; margin: 0; padding: 20px;">
                ${invoiceHTML}
            </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.focus();
    setTimeout(() => {
        printWindow.print();
        printWindow.close();
    }, 250);
}

        // ============================
        // SECTION: TRANSACTIONS END
        // ============================


        // Filtering berdasarkan pilihan
function filterItems() {
    let filterType = $('#filterBy').val();
    let keyword = $('#searchInputItem').val();
    
    let data = { keyword: keyword };

    if (filterType) {
        data.filterType = filterType;
    }
    
    $.ajax({
        url: "<?php echo site_url('dashboard/filter_items'); ?>",
        method: "GET",
        data: data,
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
                    if (item.images) {
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
        error: function() {
            alert('Terjadi kesalahan saat mencari item.');
        }
    });
}

function printAllDataItem() {
    let table = document.getElementById('itemTable');

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
                <title>Laporan Data Produk</title>
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
                        <h1 class="report-title">Laporan Data Produk</h1>
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
        console.error("Tabel produk tidak ditemukan!");
    }
}

        // ============================
        // SECTION: EMPLOYEE START
        // ============================

        // Fungsi untuk pencarian member
        function searchEmployee() {
            let input = document.getElementById('searchInputEmployee').value.toLowerCase();
            let table = document.getElementById('employeeTable');
            let rows = table.getElementsByTagName('tr');

            // Looping melalui baris tabel dan menyembunyikan baris yang tidak sesuai dengan pencarian
            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                let name = cells[1].textContent.toLowerCase();
                let position = cells[2].textContent.toLowerCase();

                if (name.indexOf(input) > -1 || position.indexOf(input) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

    // Fungsi untuk mencetak seluruh tabel
    function printAllDataEmployee() {
    let table = document.getElementById('employeeTable');

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
        // ============================
        // SECTION: KARYAWAN END
        // ============================


    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    </body>
    </html>