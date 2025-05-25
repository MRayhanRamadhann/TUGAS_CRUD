<?php 
include("database.php");         
    $id = $_POST['id']; 
        $nama = $_POST['nama']; 
        $alamat = $_POST['alamat']; 
        $jk = $_POST['jenis_kelamin']; 
        $agama = $_POST['agama']; 
        $sekolah = $_POST['sekolah_asal']; 
         
        $query = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id"; 
        $result = mysqli_query($koneksi, $query); 
        if(!$result){             
                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi)); 
        } else { 
          //tampil alert dan akan redirect ke halaman index.php           //silahkan ganti index.php sesuai halaman yang akan dituju           
          echo "<script>alert('Data berhasil diubah.');window.location='hasil_login.php';</script>"; 
        } 
?>  
