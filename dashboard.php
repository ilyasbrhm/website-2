<?php
// Contoh data pengguna yang masuk setelah login
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// Ambil data pengguna dari session
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/dashboard.css"> <!-- Tautan CSS -->
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Welcome, <?php echo htmlspecialchars($user); ?>!</h2>
        <nav>
            <ul>
                <li><a href="#overview">Overview</a></li>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><a href="logout.php" class="logout">Logout</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="main-content">
        <header class="header">
            <h1>Dashboard</h1>
        </header>

        <section id="overview" class="section">
            <h2>Overview</h2>
            <p>Selamat datang di dashboard Anda. Anda bisa melihat informasi terbaru dan mengelola akun di sini.</p>
        </section>

        <section id="profile" class="section">
            <h2>Profile</h2>
            <p>Informasi akun Anda akan tampil di sini.</p>
        </section>

        <section id="settings" class="section">
            <h2>Settings</h2>
            <p>Pengaturan akun dapat diakses di sini.</p>
        </section>
    </main>
</body>
</html>
