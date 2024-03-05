<?php 

class Database{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name = DB_NAME;

  private $dbh;
  private $stmt;

  public function __construct(){
    // Menghubungkan ke database
    $dsn = 'mysql:host=' . $this->host . '; dbname=' .$this->db_name;
  
    $option = [
      // Menjaga Koneksi Database
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try{
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
    }catch(PDOException $er){
      die($er->getMessage());
    }
  }

  // Melakukan persiapan dari query yang ditentukan
  public function query($query_req){
    $this->stmt = $this->dbh->prepare($query_req);
  }

  // Melakukan komparasi untuk menentukan tipe data
  public function binding($parameter, $value, $type = null){
    if(is_null($type)){
      switch (true){
        case is_int($value) :
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value) :
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value) :
          $type = PDO::PARAM_NULL;
          break;
        default : 
        $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($parameter, $value, $type);
  }

  // Mengekseskui query yang telah ditetapkan
  public function execute(){
    $this->stmt->execute();
  }

  // Mengeksekusi dan menampilkan keseluruhan data di database
  public function resultSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  // Mengeksekusi dan menampilkan 1 data dari database
  public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }
  // Memantau perubahan baris untuk verifikasi (CRUD);
  public function rowCount(){
    return $this->stmt->rowCount();
  }

}


?>