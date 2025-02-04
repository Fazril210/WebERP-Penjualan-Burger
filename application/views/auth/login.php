<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\ device-width, initial-scale=1.0">
    <title>Buck Up - Login</title>
    <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');

        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }

        .left-side {
            background-color: #F3881C; /* Orange background */
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .right-side {
            background-color: #000; /* Black background */
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #333; /* Dark grey background */
            color: #fff; /* White text */
            border-radius: 12px;
            padding: 30px 40px 40px 40px; /* Adjusted padding to reduce top space */
            width: 400px; /* Adjust width as needed */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        h2 {
            color: #F3881C; /* Orange heading */
            margin-top: 0; /* Reduced top margin */
            margin-bottom: 10px; /* Reduced bottom margin */
            text-shadow: -4px 4px 6.3px #FF0000; /* Red shadow adjusted */
            font-family: 'Anton', sans-serif; /* Anton font */
            font-size: 85px; /* Font size */
        }

        .input-field {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            display: inline-block;
            margin-bottom: 5px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif; /* Anton font */
        }

        input[type="text"],
        input[type="password"] {
            width: 380px; /* Reduced width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #444;
            color: #fff; 
        }

        .forgot-password {
            color: #FF6600;
            display: block;
            margin-bottom: 10px;
            text-align: left; /* Align to the left */
        }

        button {
            background-color: #FF6600; /* Orange button */
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e55b00; /* Darker orange on hover */
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .dashboard-text {
            font-size: 24px; /* Font size */
            font-family: 'Poppins', sans-serif; /* Anton font */
            font-weight: bold; /* Bold text */
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 20px;
                width: 90%; /* Responsive width */
            }
            h2 {
                font-size: 48px; /* Adjust heading size for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="left-side">
        <img src="<?php echo base_url('assets/logo/Logo.png')?>" alt="Logo" class="logo" style="width: 350px;"> <!-- Logo -->
    </div>
    <div class="right-side">
        <div class="login-container">
            <?php if ($this->session->flashdata('error')): ?>
                <p class="error-message"><?php echo $this->session->flashdata('error'); ?></p>
            <?php endif; ?>

            <h2>BUCK UP</h2>
            <p class="dashboard-text">Masuk ke Dashboard</p>

            <form action="<?php echo site_url('auth/do_login'); ?>" method="post">
                <div class="input-field">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required placeholder="Masukkan username">
                </div>
                <div class="input-field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" required placeholder="Masukkan password">
                </div>
                <button type="submit"><b>Sign In</b></button>
            </form>
        </div>
    </div>
    <script>
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?= $this->session->flashdata('success'); ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $this->session->flashdata('error'); ?>',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>

</body>
</html>