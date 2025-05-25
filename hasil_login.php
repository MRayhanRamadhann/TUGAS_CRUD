<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Database Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-top: 40px;
            font-size: 28px;
            color: #333;
        }

        center {
            padding: 30px;
        }

        table {
            border-collapse: collapse;
            width: 95%;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions {
            font-size: 14px;
        }

        .footer-links {
            margin-top: 30px;
            font-size: 14px;
        }

        .footer-links a {
            background-color: #28a745;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            margin-right: 10px;
            text-decoration: none;
        }

        .footer-links a:hover {
            background-color: #218838;
        }

        .total {
            margin-top: 20px;
            font-size: 16px;
        }

        footer {
            margin-top: 40px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>
    <center>
        <h1>LIST DATA PENDAFTAR BARU</h1>
        <hr style="width: 80%; border: 1px solid #ccc;">
        <p style="font-size: 14px;">Data ini adalah data lengkap dari siswa baru yang mendaftar ke sekolah.</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM calon_siswa ORDER BY id ASC"; 
                $query = mysqli_query($koneksi, $sql); 
                $number = 1;         
                while($siswa = mysqli_fetch_array($query)){ ?> 
                    <tr> 
                        <td><?php echo $number++; ?></td> 
                        <td><?php echo $siswa['nama']; ?></td> 
                        <td><?php echo $siswa['alamat']; ?></td> 
                        <td><?php echo $siswa['jenis_kelamin']; ?></td> 
                        <td><?php echo $siswa['agama']; ?></td> 
                        <td><?php echo $siswa['sekolah_asal']; ?></td> 
                        <td class="actions">
                            <a href="form_edit.php?edit=<?php echo $siswa['id']; ?>">Edit</a> |  
                            <a href="hapus.php?delete=<?php echo $siswa['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Delete</a>
                        </td>
                    </tr> 
                <?php } ?> 
            </tbody>
        </table>

        <p class="total">Total Pendaftar Masuk: <b><?php echo mysqli_num_rows($query); ?> Siswa</b></p>

        <div class="footer-links">
            <a href="index.php">Logout</a>
            <a href="form_tambah_data.php">Tambahkan Data Lagi</a>
        </div>

        <footer>
            <p>&copy; 2018 Form Pendaftaran Siswa. All rights reserved.</p>
        </footer>
    </center>
</body>
</html>
