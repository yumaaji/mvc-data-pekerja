<?php 

class Controller{

  // Mengelola perintah Controller
  // Mejalankan view berdasarkan perintah/method di URL
  public function view($urlView, $data = []){
    require_once '../app/view/' . $urlView . '.php';
  }

  // Menjalankan model(pengelolaan) berdasarkan method di URL 
  public function model($model){
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }

}