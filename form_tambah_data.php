<?php include("database.php"); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Siswa Baru</title>
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
            display: inline-block;
            margin-right: 15px;
            font-weight: normal;
        }

        input[type="submit"] {
            background-color: #28a745;
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
            background-color: #218838;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
            font-size: 13px;
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
    </style>
</head>
<body>

<div class="container">
    <h1>Formulir Pendaftaran Siswa Baru</h1>
    <p class="subtitle">Silakan isi formulir di bawah ini dengan lengkap</p>

    <form method="POST" action="form_tambah_data.php">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" placeholder="Nama Lengkap">

        <label for="alamat">Alamat Lengkap</label>
        <textarea name="alamat" rows="4" placeholder="Alamat lengkap"></textarea>

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <div class="radio-group">
            <label><input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
        </div>

        <label for="agama">Agama</label>
        <select name="agama">
            <option value="">-- Pilih Agama --</option>
            <option>Islam</option>
            <option>Kristen</option>
            <option>Hindu</option>
            <option>Budha</option>
            <option>Atheis</option>
        </select>

        <label for="sekolah_asal">Sekolah Asal</label>
        <input type="text" name="sekolah_asal" placeholder="Nama Sekolah Asal">

        <input type="submit" name="add" value="Simpan Data Siswa">
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

<?php 
if(isset($_POST['add'])) {
    $nama = trim($_POST['nama']); 
    $alamat = trim($_POST['alamat']); 
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $agama = $_POST['agama']; 
    $sekolah_asal = trim($_POST['sekolah_asal']); 

    if (empty($nama) || empty($alamat) || empty($jenis_kelamin) || empty($agama) || empty($sekolah_asal)) {
        echo "<script>alert('Semua kolom wajib diisi!'); window.history.back();</script>";
        exit;
    }

    $query = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) 
              VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal')"; 
    $result = mysqli_query($koneksi, $query); 

    if(!$result){
        die("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi)); 
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='hasil_login.php';</script>"; 
    }
}
?>
