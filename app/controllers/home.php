<?php 

class Home extends Controller{

  // Menampilkan halaman home/default
  public function index(){
    $data['judul_halaman'] = 'Home Page';
    $this->view('templates/header', $data);
    $this->view('home/index');
    $this->view('templates/footer');
  } 

}