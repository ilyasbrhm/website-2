<?php
session_start();
include "database/database.php"; // File koneksi database Anda

if (isset($_POST["register"])) {
    $username = $_POST["nama"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Enkripsi password

    // Query untuk memeriksa apakah username sudah digunakan
    $checkSql = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = $db->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Username sudah digunakan
        $error = "Nama sudah dipakai, silakan gunakan nama lain.";
    } else {
        // Query untuk memasukkan data ke database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($db->query($sql)) {
            $success = "Akun berhasil didaftarkan! Silakan login.";
        } else {
            $error = "Gagal mendaftarkan akun: " . $db->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles2.css"> <!-- Tautkan ke file CSS -->
</head>
<body>
    <div class="register-form">
        <h2>Register</h2>
        <?php if (isset($success)) { ?>
            <p class="success"><?php echo htmlspecialchars($success); ?></p>
        <?php } ?>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php } ?>
        <form action="register.php" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <button type="submit" name="register">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
    </div>
</body>
</html>
