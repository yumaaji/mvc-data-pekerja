<?php 

class Admin_model{
  
  // nama tabel default
  private $db_tabel = 'data_pekerja';
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  // Mengambil data seluruh pekerja
  public function getAllDataPekerja(){
    $query_req = 'SELECT * FROM ' . $this->db_tabel;
    $this->db->query($query_req);
    return $this->db->resultSet();
  }

  // Mengambil salah satu data pekerja berdasarkan id yang ditentukan
  public function getDataById($id){
    $query_req = 'SELECT * FROM ' . $this->db_tabel . ' WHERE id=:id';

    $this->db->query($query_req);
    $this->db->binding('id', $id);

    return $this->db->single();
  }
  
  // Menambah data pekerja baru
  public function tambahData($dataBaru){
    $query_req = "INSERT INTO data_pekerja VALUES ('', :nama, :jabatan, :alamat, :telepon, :gender)";
    
    $this->db->query($query_req);
    $this->db->binding('nama', strtoupper($dataBaru['nama']));
    $this->db->binding('jabatan', $dataBaru['jabatan']);
    $this->db->binding('alamat', strtoupper($dataBaru['alamat']));
    $this->db->binding('telepon', $dataBaru['telepon']);
    $this->db->binding('gender', strtoupper($dataBaru['gender']));

    $this->db->execute();
    
    return $this->db->rowCount();
  }

  // Menghapus data siswa berdasarkan id yang telah ditentukan
  public function hapusData($id){
    $query_req = "DELETE FROM data_pekerja WHERE id=:id";

    $this->db->query($query_req);
    $this->db->binding('id', $id);
    $this->db->execute();

    return $this->db->rowCount();
  }

  // Mengupdate data siswa berdasarkan id yang telah ditentukan
  public function ubahData($dataUpdate){
    $query_req = "UPDATE data_pekerja SET 
                  nama = :nama,
                  jabatan = :jabatan,
                  alamat = :alamat,
                  telepon = :telepon,
                  gender = :gender
                   WHERE id = :id";
    
    $this->db->query($query_req);
    $this->db->binding('nama', strtoupper($dataUpdate['nama']));
    $this->db->binding('jabatan', $dataUpdate['jabatan']);
    $this->db->binding('alamat', strtoupper($dataUpdate['alamat']));
    $this->db->binding('telepon', $dataUpdate['telepon']);
    $this->db->binding('gender', strtoupper($dataUpdate['gender']));
    $this->db->binding('id', $dataUpdate['id']);

    $this->db->execute();
    
    return $this->db->rowCount();
  }

  // Melakukan query untuk mencari data pekerja berdasarkan nama pada inputan form
  public function cariDataSiswa(){
    $keyword = $_POST['keyword'];
    $query_req = "SELECT * FROM data_pekerja WHERE nama LIKE :keyword";

    $this->db->query($query_req);
    $this->db->binding('keyword', "%$keyword%");
    return $this->db->resultSet();
  }
}