<!-- Menampilkan data salah satu pekerja yang dipilih -->
<div class="container-fluid mt-4">
  <div class="col-6">
    <ul class="list-group">
      <li class="list-group-item list-group-item-action active"><h6>Detail Data Pekerja</h6></li>
      <li class="list-group-item"><?= $data['pekerja']['nama'] ?></li>
      <li class="list-group-item"><?= $data['pekerja']['jabatan'] ?></li>
      <li class="list-group-item"><?= $data['pekerja']['alamat'] ?></li>
      <li class="list-group-item"><?= $data['pekerja']['telepon'] ?></li>
      <li class="list-group-item"><?= $data['pekerja']['gender'] ?></li>
    </ul>
  </div>

  <!-- Kembali ke dashboard admin -->
  <a href="<?=BASEURL?>/admin"><button type="button" class="btn btn-primary my-3 tombolModalFormTambahData">Kembali</button></a>
</div>