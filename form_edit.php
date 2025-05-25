<?php
include("database.php");

if (!isset($_GET['edit'])) {
    header('Location: form_edit.php');
    exit;
}

$id = $_GET['edit'];
$query = "SELECT * FROM calon_siswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) < 1) {
    die("Data tidak ditemukan...");
}

$siswa = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            padding: 30px;
            margin: 50px auto;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }

        p.subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        .radio-group {
            margin-bottom: 20px;
        }

        .radio-group label {
            margin-right: 15px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .nav-links {
            margin-top: 20px;
            text-align: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Data Siswa</h1>
    <p class="subtitle">Silakan ubah data di bawah ini</p>

    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">

        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" value="<?php echo $siswa['nama']; ?>">

        <label for="alamat">Alamat Lengkap</label>
        <textarea name="alamat" rows="4"><?php echo $siswa['alamat']; ?></textarea>

        <label>Jenis Kelamin</label>
        <div class="radio-group">
            <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($siswa['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?>> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($siswa['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan</label>
        </div>

        <label for="agama">Agama</label>
        <select name="agama">
            <?php 
            $daftar_agama = ['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghuchu'];
            foreach ($daftar_agama as $agama) {
                $selected = ($siswa['agama'] == $agama) ? 'selected' : '';
                echo "<option value='$agama' $selected>$agama</option>";
            }
            ?>
        </select>

        <label for="sekolah_asal">Sekolah Asal</label>
        <input type="text" name="sekolah_asal" value="<?php echo $siswa['sekolah_asal']; ?>">

        <input type="submit" value="Ubah Data Siswa">
    </form>

    <div class="nav-links">
        <a href="hasil_login.php">[📋] Lihat Data Calon Siswa</a> |
        <a href="index.php">[⇦] Logout</a>
    </div>
</div>

<div class="footer">
    &copy; 2018 Form Pendaftaran Siswa. All rights reserved.
</div>

</body>
</html>
