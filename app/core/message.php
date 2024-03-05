<?php 

// Pesan yang akan muncul ketika proses CRUD selesai dieksekusi
class Message{

  // Persiapan untuk menyimpan pesan yang akan ditampilkan
  // $pesan = (ditambah, diubah, dihas)
  // $aksi = (berhasil, gagal)
  // $tipe = (success=berhasil, danger=gagal)
  public static function setMessage($pesan, $aksi, $tipe){
    $_SESSION['message'] = ['pesan'=>$pesan, 'aksi'=>$aksi, 'tipe'=>$tipe];
  }

  // Pesan default yang akan ditampilkan
  public static function message(){
    if(isset($_SESSION['message'])){
      echo '<div class="alert alert-'.$_SESSION['message']['tipe']. ' alert-dismissible fade show" role="alert"> Data Pekerja
              <strong>' . $_SESSION['message']['pesan'] . '</strong> ' . $_SESSION['message']['aksi'] . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      
      unset($_SESSION['message']);
    }
  }
}

?>