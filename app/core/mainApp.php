<?php 

// IMPORTANT
// Digunakan untuk menjalankan controller yang diterima dari URL
// Untuk menentukan controller mana yang akan dibuka dan dieksekui
class mainApp{

  // controller, method, dan parameter default
  protected $controller = 'Home';
  protected $method = 'index';
  protected $parameter = [];

  public function __construct(){
    $url = $this->urlManage();

    // Mengambil Nama Controller
    if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')){
      $this->controller = $url[0];
      unset($url[0]);
    }
    // Menginstansiasi controller mana yang akan dieksekui
    require_once '../app/controllers/' .  $this->controller . '.php';
    $this->controller = new $this->controller;

    if (isset($url[1])){
      if (method_exists($this->controller, $url[1])){
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    if (!empty($url)){
      $this->parameter = array_values($url);
    }

    // Menjalankan controller, method. dan parameter yang telah diterima
    // Jika tidak ada controller, method, dan parameter yang dikirim maka akan menggunakan
    // Setingan default di atas
    call_user_func_array([$this->controller, $this->method], $this->parameter);
  }

  // Melakukan pengambilan URL untuk
  // Menenukan Controller. Method, dan Parameter
  public function urlManage(){
    if (isset($_GET['url'])){
      // Menghapus (/) yang ada di paling kanan URL
      $url = rtrim($_GET['url']. '/');
      // Menghilangkan karakter pengganggu (spasi, petik, koma, dll)
      $url = filter_var($url, FILTER_SANITIZE_URL);
      // Memecahnya menjadi arry
      $url = explode('/', $url);
      return $url;

      var_dump($url);
    }
  }

}
