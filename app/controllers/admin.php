<?php 

class Admin extends Controller{
  // Halaman admin utama/default
  public function index(){
    $data['judul_halaman'] = "Dashboard Admin";
    $data['pekerja'] = $this->model('Admin_model')->getAllDataPekerja();
    $this->view('templates/header', $data);
    $this->view('admin/dashboard', $data);
    $this->view('templates/footer');
  }

  // Detail data setiap pekerja
  public function detail($id){
    $data['judul_halaman'] = "Detail Pekerjaan";
    $data['pekerja'] = $this->model('Admin_model')->getDataById($id);
    $this->view('templates/header', $data);
    $this->view('admin/detail', $data);
    $this->view('templates/footer');
  }

  // Menambahkan data pekerja baru
  public function tambah(){
    if ($this->model('Admin_model')->tambahData($_POST) > 0 ){
      Message::setMessage('berhasil', 'ditambahkan', 'success');
      header('location: ' . BASEURL . '/admin');
      exit;
    }else{
      header('location: ' . BASEURL . '/admin');
      Message::setMessage('gagal', 'ditambahkan', 'danger');
      exit;
    }
  }
  
  // Menghapus data pekerja yang terlah terdaftar
  public function hapus($id){
    if ($this->model('Admin_model')->hapusData($id) > 0 ){
      Message::setMessage('berhasil', 'dihapus', 'success');
      header('location: ' . BASEURL . '/admin');
      exit;
    }else{
      header('location: ' . BASEURL . '/admin');
      Message::setMessage('gagal', 'dihapus', 'danger');
      exit;
    }
  }

  // Mendapatkan dan mengirim data pekerja ke form Modal
  // Di kirim dalam bentuk JSON 
  // Dikelola oleh javascript - script.js
  public function getUbah(){
    echo json_encode($this->model('Admin_model')->getDataById($_POST['id']));
  }
  
  // Mengubah data pekerja yang telah terdaftar
  public function ubah(){
    if ($this->model('Admin_model')->ubahData($_POST) > 0 ){
      Message::setMessage('berhasil', 'diubah', 'success');
      header('location: ' . BASEURL . '/admin');
      exit;
    }else{
      header('location: ' . BASEURL . '/admin');
      Message::setMessage('gagal', 'diubah', 'danger');
      exit;
    }
  }

  // Form search untuk menemukan data berdasarkan nama
  public function cari(){
    $data['judul_halaman'] = "Dashboard Admin";
    $data['pekerja'] = $this->model('Admin_model')->cariDataSiswa();
    $this->view('templates/header', $data);
    $this->view('admin/dashboard', $data);
    $this->view('templates/footer');
  }
}
