<?php include("database.php"); 
        $id = $_GET['delete']; 
                
        $query = "DELETE FROM calon_siswa WHERE id=$id"; 
        $result = mysqli_query($koneksi, $query); 
         
        if(!$result){            
             die ("Query gagal dijalankan: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi)); 
        } else { 
          //tampil alert dan akan redirect ke halaman index.php           //silahkan ganti index.php sesuai halaman yang akan dituju 
          echo "<script>alert('Data berhasil dihapus.');window.location='hasil_login.php';</script>;
_login.php';</script>"; 
        } 
?>  
