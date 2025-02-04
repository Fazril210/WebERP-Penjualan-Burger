    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buck Up - Payment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
            }
            .payment-container {
                max-width: 800px;
                margin: 30px auto;
                background: #fff;
                border-radius: 15px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .payment-header {
                background-color: #ffc107;
                padding: 20px;
                border-radius: 15px 15px 0 0;
                color: #000;
            }
            .payment-body {
                padding: 30px;
            }
            .order-summary {
                background: #f8f9fa;
                padding: 20px;
                border-radius: 10px;
                margin-bottom: 30px;
            }
            .payment-method-card {
                border: 2px solid #dee2e6;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            .payment-method-card:hover {
                border-color: #ffc107;
                background-color: #fff9e6;
            }
            .payment-method-card.selected {
                border-color: #ffc107;
                background-color: #fff9e6;
            }
            .payment-icon {
                font-size: 2rem;
                margin-right: 15px;
            }
            .quick-amount {
                border: 1px solid #dee2e6;
                padding: 10px 20px;
                border-radius: 25px;
                margin: 5px;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            .quick-amount:hover {
                background-color: #ffc107;
                border-color: #ffc107;
                color: #000;
            }
            .receipt-wrapper {
                font-family: 'Courier New', monospace;
                width: 80mm; /* Standard thermal receipt width */
                margin: 0 auto;
                padding: 5mm;
                background: white;
                border: none;
            }

            .receipt-header {
                text-align: center;
                margin-bottom: 10px;
            }

            .receipt-header h1 {
                font-size: 24px;
                font-weight: bold;
                margin: 0;
                padding: 0;
            }

            .receipt-header p {
                font-size: 12px;
                margin: 5px 0;
            }

            .divider {
                border-top: 1px dashed #000;
                margin: 10px 0;
            }

            .receipt-items {
                margin: 15px 0;
            }

            .item-row {
                font-size: 12px;
                margin: 5px 0;
            }

            .item-name {
                font-weight: normal;
            }

            .item-details {
                display: flex;
                justify-content: space-between;
                padding-left: 15px;
            }

            .totals {
                margin-top: 10px;
                border-top: 1px dashed #000;
                padding-top: 10px;
            }

            .total-row {
                display: flex;
                justify-content: space-between;
                font-size: 12px;
                margin: 5px 0;
            }

            .total-row.grand-total {
                font-weight: bold;
                font-size: 14px;
            }

            .receipt-footer {
                text-align: center;
                margin-top: 20px;
                font-size: 12px;
            }

            .receipt-footer p {
                margin: 5px 0;
            }

            /* Print-specific styles */
            @media print {
                /* Hide everything except the receipt when printing */
                body * {
                    visibility: hidden;
                    margin: 0;
                    padding: 0;
                }
                
                /* Only show the receipt content */
                #receipt, #receipt * {
                    visibility: visible;
                }
                
                /* Position the receipt properly */
                #receipt {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 80mm !important; /* Standard thermal receipt width */
                    padding: 5mm !important;
                    margin: 0 !important;
                }

                /* Hide modal elements when printing */
                .modal-header, .modal-footer, .btn-close, .no-print {
                    display: none !important;
                }

                /* Remove any backgrounds and shadows */
                .modal-content {
                    border: none !important;
                    box-shadow: none !important;
                    background: none !important;
                }

                /* Format text for thermal receipt */
                .receipt-header h1 {
                    font-size: 18px !important;
                    margin-bottom: 5px !important;
                }

                .receipt-header p {
                    font-size: 12px !important;
                    margin: 2px 0 !important;
                }

                .item-row {
                    font-size: 12px !important;
                    margin: 3px 0 !important;
                }

                .total-row {
                    font-size: 12px !important;
                    margin: 2px 0 !important;
                }

                .total-row.grand-total {
                    font-size: 14px !important;
                    font-weight: bold !important;
                }

                .receipt-footer {
                    font-size: 12px !important;
                    margin-top: 10px !important;
                }

                .divider {
                    border-top: 1px dashed #000 !important;
                    margin: 5px 0 !important;
                }
            }
        </style>
    </head>
    <body>
        <div class="payment-container">
            <div class="payment-header">
                <h2 class="mb-0"><i class="bi bi-wallet2"></i> Payment</h2>
            </div>
            
            <div class="payment-body">
                <!-- Member Selection -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="memberCheckbox">
                    <label class="form-check-label" for="memberCheckbox">
                        Member (Get 2% Discount)
                    </label>
                </div>

                <!-- Container untuk daftar member -->
    <div id="memberSelection" class="mt-3 d-none">
        <h5>Pilih Member</h5>
        <div class="list-group" id="memberList">
            <!-- Daftar member akan dimuat secara dinamis -->
        </div>
    </div>

    <p id="selectedMember" class="text-success mt-2"></p>



                <!-- Order Summary -->
                <div class="order-summary">
                    <h4 class="mb-3">Order Summary</h4>
                    <div id="orderItems">
                        <!-- Order items akan muncul di sini -->
                    </div>
                    <div class="border-top mt-3 pt-3">
                        <div class="d-flex justify-content-between">
                            <h5>Subtotal:</h5>
                            <h5 id="subtotalAmount">Rp 0</h5>
                        </div>
                        <div class="d-flex justify-content-between" >
                            <h5>Discount (2%):</h5>
                            <h5 id="discountAmount" style="color: #00ff00;">Rp 0</h5>
                        </div>
                        <div class="d-flex justify-content-between" >
        <h5>Tax (11%):</h5>
        <h5 id="taxAmount" style="color: #ff0000;">Rp 0</h5>
    </div>
                        <div class="d-flex justify-content-between">
                            <h5>Total Amount:</h5>
                            <h5 class="text-primary" id="totalAmount">Rp 0</h5>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <h4 class="mb-3">Select Payment Method</h4>
                <div class="payment-methods">
                    <div class="payment-method-card" onclick="selectPaymentMethod('cash')">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-cash payment-icon"></i>
                            <div>
                                <h5 class="mb-1">Cash</h5>
                                <p class="mb-0 text-muted">Pay with physical cash</p>
                            </div>
                        </div>
                    </div>

                    <div class="payment-method-card" onclick="selectPaymentMethod('qris')">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-qr-code payment-icon"></i>
                            <div>
                                <h5 class="mb-1">QRIS</h5>
                                <p class="mb-0 text-muted">Scan QR code to pay</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cash Payment Section -->
                <div id="cashPayment" class="mt-4 d-none">
                    <h5>Cash Amount</h5>
                    <div class="quick-amounts mb-3">
                        <button class="btn quick-amount" data-amount="50000">Rp 50.000</button>
                        <button class="btn quick-amount" data-amount="100000">Rp 100.000</button>
                        <button class="btn quick-amount" data-amount="200000">Rp 200.000</button>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="cashAmount" placeholder="Enter amount">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Change:</label>
                        <h4 id="changeAmount" class="text-success">Rp 0</h4>
                    </div>
                </div>

                <!-- QRIS Payment Section -->
                <div id="qrisPayment" class="mt-4 d-none text-center">
                    <img src="<?= base_url('assets/images/qris.jpg')?>" alt="QRIS Code" class="img-fluid mb-3">
                    <p class="text-muted">Scan this QR code with your payment app</p>
                </div>

                <!-- Payment Actions -->
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-danger" onclick="window.history.back()"> Batal
                    </button>
                    <button class="btn btn-warning" id="processPayment" onclick="processPayment()">
                        Complete Payment <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Struk (Receipt) -->
        <div class="modal fade" id="receiptModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="receipt-wrapper" id="receipt">
                        <div class="receipt-header">
                            <h1>BUCK UP</h1>
                            <p>Jl. Pramuka No.42, Kota Bekasi, Indonesia</p>
                            <p id="receipt-datetime"></p>
                            <p id="receipt-order"></p>
                        </div>

                        <div class="divider"></div>

                        <div class="receipt-items" id="items-container"></div>

                        <div class="totals">
                            <div class="total-row">
                                <span>Subtotal:</span>
                                <span id="receipt-subtotal">Rp 0</span>
                            </div>
                            <div class="total-row">
                                <span>Discount (2%):</span>
                                <span id="receipt-discount">Rp 0</span>
                            </div>
                            <div class="total-row">
                                <span>Tax (11%):</span>
                                <span id="receipt-tax">Rp 0</span>
                            </div>
                            <div class="total-row grand-total">
                                <span>TOTAL:</span>
                                <span id="receipt-total">Rp 0</span>
                            </div>
                            <div class="total-row" id="receipt-cash-row">
                                <span>Cash:</span>
                                <span id="receipt-cash-amount">Rp 0</span>
                            </div>
                            <div class="total-row" id="receipt-change-row">
                                <span>Change:</span>
                                <span id="receipt-change-amount">Rp 0</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="receipt-footer">
                            <p>Thank you for dining with us!</p>
                            <p>Please come again</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary no-print" onclick="window.print()">
                        <i class="bi bi-printer"></i> Print Receipt
                    </button>
                    <button class="btn btn-warning" data-bs-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>


        <!-- CDN Bootstrap JS dan script custom -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            let selectedPaymentMethod = '';
            let isMember = false;

            document.addEventListener('DOMContentLoaded', function() {
                // Ambil cart dari localStorage
                const cart = JSON.parse(localStorage.getItem('cart') || '{}');
                displayOrderItems(cart);

                // Event listener for member checkbox
                document.getElementById('memberCheckbox').addEventListener('change', function() {
                    isMember = this.checked;
                    displayOrderItems(cart);
                });
            });


            document.addEventListener('DOMContentLoaded', function () {
        const memberCheckbox = document.getElementById('memberCheckbox');
        const memberSelection = document.getElementById('memberSelection');
        const memberList = document.getElementById('memberList');

        // Event listener untuk checkbox
        memberCheckbox.addEventListener('change', function () {
            if (this.checked) {
                fetchMembers();
                memberSelection.classList.remove('d-none'); // Tampilkan daftar member
            } else {
                memberSelection.classList.add('d-none'); // Sembunyikan daftar member
            }
        });

        // Fungsi untuk memuat daftar member
        function fetchMembers() {
            fetch('<?= base_url("kasir/get_all_members"); ?>')
                .then((response) => response.json())
                .then((data) => {
                    if (data.status === 'success') {
                        renderMemberList(data.data);
                    } else {
                        alert('Tidak ada member yang terdaftar.');
                    }
                })
                .catch((error) => {
                    console.error('Error fetching members:', error);
                });
        }

        // Fungsi untuk menampilkan daftar member di UI
        function renderMemberList(members) {
            memberList.innerHTML = ''; // Reset daftar sebelumnya
            members.forEach((member) => {
                const listItem = document.createElement('button');
                listItem.className = 'list-group-item list-group-item-action';
                listItem.textContent = `${member.name} (${member.email})`;
                listItem.setAttribute('data-id', member.id);

                // Event listener untuk memilih member
                listItem.addEventListener('click', function () {
                    document.getElementById('selectedMember').textContent = `Member Terpilih: ${member.name}`;
                    memberCheckbox.setAttribute('data-member-id', member.id); // Simpan ID member yang dipilih
                    memberSelection.classList.add('d-none'); // Sembunyikan daftar member
                });

                memberList.appendChild(listItem);
            });
        }
    });


            document.addEventListener('DOMContentLoaded', function () {
        const cart = JSON.parse(localStorage.getItem('cart') || '{}');
        displayOrderItems(cart);
        console.log('Cart data:', cart);

        document.getElementById('processPayment').addEventListener('click', function () {
            const paymentMethod = selectedPaymentMethod; // Dapatkan metode pembayaran yang dipilih
            if (!paymentMethod) {
                alert('Please select a payment method');
                return;
            }

            // Siapkan data pesanan
            const orderData = {
                cart: cart,
                total_price: parseInt(document.getElementById('totalAmount').textContent.replace(/\D/g, '')),
                payment_method: paymentMethod,
                member_discount: isMember ? 0.02 : 0,
                tax: 0.11,
                final_price: total // Total harga akhir
            };

            console.log('Order data to send:', orderData); 

            // Kirim data ke server
            fetch("<?= base_url('kasir/save_order') ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(orderData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Order berhasil disimpan!');
                    localStorage.removeItem('cart'); // Hapus cart dari localStorage
                    window.location.href = "<?= base_url('kasir') ?>"; // Kembali ke halaman kasir
                } else {
                    alert('Gagal menyimpan pesanan: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error saving order:', error);
                alert('Terjadi kesalahan saat menyimpan pesanan.');
            });
        });
    });


    function displayOrderItems(cart) {
        const orderItems = document.getElementById('orderItems');
        let subtotal = 0;

        orderItems.innerHTML = '';
        Object.entries(cart).forEach(([name, details]) => {
            const itemTotal = details.price * details.quantity;
            subtotal += itemTotal;

            // Tampilkan detail item
            orderItems.innerHTML += `
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <span>${name}</span>
                        <small class="text-muted"> x ${details.quantity}</small>
                    </div>
                    <span>Rp ${itemTotal.toLocaleString()}</span>
                </div>
            `;
        });

        // Calculate discount
        let discount = 0;
        if (isMember) {
            discount = Math.round(subtotal * 0.02); // 2% discount for members
        }

        // Calculate taxable amount and tax
        let taxableAmount = subtotal - discount;
        let tax = Math.round(taxableAmount * 0.11); // 11% tax

        // Calculate total after discount and tax
        let total = taxableAmount + tax;

        // Update the order summary
        document.getElementById('subtotalAmount').textContent = `Rp ${subtotal.toLocaleString()}`;
        document.getElementById('discountAmount').textContent = `Rp ${discount.toLocaleString()}`;
        document.getElementById('taxAmount').textContent = `Rp ${tax.toLocaleString()}`;
        document.getElementById('totalAmount').textContent = `Rp ${total.toLocaleString()}`;

        // If cash payment is selected, update change
        if (selectedPaymentMethod === 'cash') {
            updateChange();
        }
    }


            function selectPaymentMethod(method) {
                selectedPaymentMethod = method;

                // Toggle UI
                document.querySelectorAll('.payment-method-card').forEach(card => {
                    card.classList.remove('selected');
                });
                event.currentTarget.classList.add('selected');

                document.getElementById('cashPayment').classList.toggle('d-none', method !== 'cash');
                document.getElementById('qrisPayment').classList.toggle('d-none', method !== 'qris');

                // Reset cash fields if switching payment methods
                if (method !== 'cash') {
                    document.getElementById('cashAmount').value = '';
                    document.getElementById('changeAmount').textContent = 'Rp 0';
                }
            }

            // Memilih jumlah cepat
            document.querySelectorAll('.quick-amount').forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('cashAmount').value = this.dataset.amount;
                    updateChange();
                });
            });

            // Hitung kembalian
            document.getElementById('cashAmount').addEventListener('input', updateChange);
            function updateChange() {
                const totalAmount = parseInt(document.getElementById('totalAmount').textContent.replace(/\D/g, ''));
                const cashAmount = parseInt(document.getElementById('cashAmount').value) || 0;
                const change = cashAmount - totalAmount;

                document.getElementById('changeAmount').textContent =
                    `Rp ${Math.max(0, change).toLocaleString()}`;
            }

            // Proses Payment
            function processPayment() {
        const cart = JSON.parse(localStorage.getItem('cart')) || {};
        const totalPrice = document.getElementById('totalAmount').textContent.replace(/\D/g, '');
        const paymentMethod = selectedPaymentMethod;
        const selectedMemberId = document.getElementById('memberCheckbox').getAttribute('data-member-id') || null;

        if (!paymentMethod) {
            alert('Pilih metode pembayaran!');
            return;
        }

        const orderData = {
            cart: Object.entries(cart).map(([name, details]) => ({
                id_items: details.id_items,
                quantity: details.quantity,
                price: details.price
            })),
            total_price: parseInt(totalPrice),
            payment_method: paymentMethod,
            member_discount: isMember ? 0.02 : 0,
            tax: 0.11,
            final_price: parseInt(totalPrice),
            id_members: selectedMemberId
        };

        fetch("<?= base_url('kasir/save_order') ?>", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(orderData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Show receipt first
                showReceipt();
                
                // Add event listener to the receipt modal for when it's hidden
                const receiptModal = document.getElementById('receiptModal');
                receiptModal.addEventListener('hidden.bs.modal', function () {
                    // Only clear cart and redirect after modal is closed
                    localStorage.removeItem('cart');
                    window.location.href = "<?= base_url('kasir') ?>";
                }, { once: true }); // Use once: true to ensure the listener is removed after execution
                
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan, silakan coba lagi.');
        });
    }


            // Menampilkan struk
            function showReceipt() {
        const cart = JSON.parse(localStorage.getItem('cart') || '{}');
        const receiptModal = new bootstrap.Modal(document.getElementById('receiptModal'));
        const memberName = document.getElementById('selectedMember').textContent.split(': ')[1] || 'Guest';

        // Waktu & Order ID
        const now = new Date();
        document.getElementById('receipt-datetime').textContent = now.toLocaleString('id-ID');
        document.getElementById('receipt-order').innerHTML = `
            Order #${Math.floor(Math.random() * 10000).toString().padStart(4, '0')}<br>
            Member: ${memberName}
        `;

        // Tampilkan item pesanan
        const itemsContainer = document.getElementById('items-container');
        itemsContainer.innerHTML = '';
        let subtotal = 0;

        Object.entries(cart).forEach(([name, details]) => {
            const itemTotal = details.price * details.quantity;
            subtotal += itemTotal;

            const itemDiv = document.createElement('div');
            itemDiv.className = 'item-row';
            itemDiv.innerHTML = `
                <div class="item-name">${name}</div>
                <div class="item-details">
                    <span>${details.quantity} x Rp ${details.price.toLocaleString()}</span>
                    <span>Rp ${itemTotal.toLocaleString()}</span>
                </div>
            `;
            itemsContainer.appendChild(itemDiv);
        });

        // Hitung pajak, diskon, dan total
        let discount = 0;
        if (isMember) {
            discount = Math.round(subtotal * 0.02);
        }
        const taxableAmount = subtotal - discount;
        const tax = Math.round(taxableAmount * 0.11);
        const total = taxableAmount + tax;

        // Update tampilan struk
        document.getElementById('receipt-subtotal').textContent = `Rp ${subtotal.toLocaleString()}`;
        document.getElementById('receipt-discount').textContent = `Rp ${discount.toLocaleString()}`;
        document.getElementById('receipt-tax').textContent = `Rp ${tax.toLocaleString()}`;
        document.getElementById('receipt-total').textContent = `Rp ${total.toLocaleString()}`;

        // Jika metode pembayaran adalah cash, tampilkan jumlah kembalian
        if (selectedPaymentMethod === 'cash') {
            const cashAmount = parseInt(document.getElementById('cashAmount').value) || 0;
            const change = cashAmount - total;
            document.getElementById('receipt-cash-amount').textContent = `Rp ${cashAmount.toLocaleString()}`;
            document.getElementById('receipt-change-amount').textContent = `Rp ${Math.max(0, change).toLocaleString()}`;
            document.getElementById('receipt-cash-row').style.display = 'flex';
            document.getElementById('receipt-change-row').style.display = 'flex';
        } else {
            document.getElementById('receipt-cash-row').style.display = 'none';
            document.getElementById('receipt-change-row').style.display = 'none';
        }

        // Tampilkan modal struk
        receiptModal.show();
    }



            // Selesai transaksi
            function finishTransaction() {
                // Hapus localStorage cart
                localStorage.removeItem('cart');
                // Kembali ke halaman kasir
                window.location.href = "<?= base_url('kasir') ?>";
            }


            document.addEventListener('DOMContentLoaded', function () {
        const memberCheckbox = document.getElementById('memberCheckbox');
        const memberSelection = document.getElementById('memberSelection');
        const memberList = document.getElementById('memberList');
        let selectedMemberId = null;

        // Event listener untuk checkbox
        memberCheckbox.addEventListener('change', function () {
            if (this.checked) {
                fetchMembers(); // Muat daftar member
                memberSelection.classList.remove('d-none'); // Tampilkan daftar member
            } else {
                memberSelection.classList.add('d-none'); // Sembunyikan daftar member
                document.getElementById('selectedMember').textContent = ''; // Reset pilihan
                selectedMemberId = null;
            }
        });

        // Fungsi untuk memuat daftar member
        function fetchMembers() {
            fetch('<?= base_url("kasir/get_all_members"); ?>')
                .then((response) => response.json())
                .then((data) => {
                    if (data.status === 'success') {
                        renderMemberList(data.data);
                    } else {
                        alert('Tidak ada member yang terdaftar.');
                    }
                })
                .catch((error) => {
                    console.error('Error fetching members:', error);
                });
        }

        // Fungsi untuk menampilkan daftar member di UI
        function renderMemberList(members) {
            memberList.innerHTML = ''; // Reset daftar sebelumnya
            members.forEach((member) => {
                const listItem = document.createElement('button');
                listItem.className = 'list-group-item list-group-item-action';
                listItem.textContent = `${member.name} (${member.email})`;
                listItem.setAttribute('data-id', member.id_members);

                // Event listener untuk memilih member
                listItem.addEventListener('click', function () {
                    selectedMemberId = member.id_members;
                    document.getElementById('selectedMember').textContent = `Member Terpilih: ${member.name}`;
                    memberCheckbox.setAttribute('data-member-id', selectedMemberId); // Simpan ID member yang dipilih
                    memberSelection.classList.add('d-none'); // Sembunyikan daftar member
                });

                memberList.appendChild(listItem);
            });
        }

        // Simpan member ID ketika proses pembayaran
        document.getElementById('processPayment').addEventListener('click', function () {
            if (selectedMemberId) {
                console.log('Selected Member ID:', selectedMemberId);
            }
        });
    });

        </script>
    </body>
    </html>
