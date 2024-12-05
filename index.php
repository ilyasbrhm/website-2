<?php
session_start();
include "database/database.php"; // File koneksi database Anda

if (isset($_POST["login"])) {
    $username = $_POST["nama"];
    $password = $_POST["password"];

    // Query untuk memeriksa keberadaan pengguna
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user["password"])) {
            // Simpan nama pengguna ke dalam sesi
            $_SESSION['user'] = $username;
            // Redirect ke dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Tautkan ke file CSS -->
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php } ?>
        <form action="index.php" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>
