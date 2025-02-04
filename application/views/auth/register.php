<html>
<head>
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi</h1>
    <form action="<?php echo site_url('auth/do_register'); ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
