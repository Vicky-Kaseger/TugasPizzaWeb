<?php
include_once 'connection.php';
session_start();
if (!isset($_SESSION["username"])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="adminhome">
    <header>
        <div class="logo">PIZZA RHAPSODY</div>
        <nav>
            <ul>
                <li><a href="#menu-section">Menu</a></li>
                <li><a href="#">Keranjang</a></li>
                <li><a href="#">Status</a></li>
                <li><a href="#">Masukan</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </nav>
    </header>
    <div class="welcome-banner">
        <div class="welcome-text">
            <h1>Selamat datang, <?php echo $_SESSION["username"]; ?>!</h1>
            <p>Bagaimana kami bisa memuaskan hasrat Anda hari ini?</p>
        </div>
    </div>
    <main>
        <div class="admin-form">
            <h2>Tambah Menu Pizza Baru</h2>
            <form action="addMenu.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nameP">Nama Pizza</label>
                    <input type="text" name="nameP" placeholder="Nama Pizza" required>
                </div>
                <div class="form-group">
                    <label for="descP">Deskripsi</label>
                    <input type="text" name="descP" placeholder="Deskripsi" required>
                </div>
                <div class="form-group">
                    <label for="priceP">Harga</label>
                    <input type="text" name="priceP" placeholder="Harga" required>
                </div>
                <div class="form-group">
                    <label for="imageP">Masukkan Gambar</label>
                    <input type="file" name="imageP" required>
                </div>
                <div class="form-group">
                    <label for="statusP">Status</label>
                    <select name="statusP" required>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Habis">Habis</option>
                    </select>
                </div>
                <button type="submit" name="submit">Tambah Pizza</button>
            </form>
        </div>
        <div id="menu-section" class="menu-list">
            <h2>Daftar Menu Pizza</h2>
            <?php
            $result = mysqli_query($data, "SELECT * FROM menu;");
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='menu-item'>";
                    echo "<p><strong>Nama:</strong> " . $row['nameMenu'] . "</p>";
                    echo "<p><strong>Deskripsi:</strong> " . $row['descMenu'] . "</p>";
                    echo "<p><strong>Harga:</strong> " . $row['price'] . "</p>";
                    echo "<p><strong>Status:</strong> " . $row['status'] . "</p>";
                    echo "<a href='editData.php?idMenu=" . $row['idMenu'] . "'>Edit</a> | ";
                    echo "<a href='deleteMenu.php?idMenu=" . $row['idMenu'] . "'>Delete</a>";
                    echo "</div><br>";
                }
            } else {
                echo "<p>Tidak ada menu pizza yang ditemukan.</p>";
            }
            ?>
        </div>
        <div class="logout-section">
            <h2>This session belongs to: <?php echo $_SESSION["username"]; ?></h2>
            <a href="logout.php" class="logout-button">LOGOUT</a>
        </div>
    </main>
</body>
</html>
