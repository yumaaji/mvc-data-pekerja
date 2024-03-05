<div class="container fluid">
  <div class="col-12">

    <h4 class="mt-5">Dashboard Admin</h4>
    <button type="button" class="btn btn-primary my-3 tombolModalFormTambahData" data-bs-toggle="modal" data-bs-target="#modalForm">Tambah Data Pekerja</button>
    <!-- Menampilkan pesan (ketika proses CRUD selesai) -->
    <?= Message::message(); ?>

    <!-- Form searching nama pekerja -->
    <form action="<?=BASEURL?>/admin/cari" method="POST">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari siswa.." name="keyword" autocomplete="off">
        <button class="btn btn-primary" type="submit" id="button-addon2" name="submit">Cari</button>
      </div>
    </form>
    <!-- End of form searching -->

    <!-- Menampilkan data pekerja -->
    <ul class="list-group ">
      <li class="list-group-item list-group-item-action active">Daftar Nama Pekerja</li>
      <?php foreach ($data['pekerja'] as $pekerja) : ?>
        <li class="list-group-item d-flex justify-content-between" aria-current="true" >
          <?php echo $pekerja['nama'] ?>
          <div>
            <a href="<?=BASEURL?>/admin/detail/<?=$pekerja['id']?>"><span class="badge text-bg-primary">detail</span></a>
            <a href="" data-bs-toggle="modal" data-bs-target="#modalForm"><span class="badge text-bg-success tombolModalFormEditData"  data-id="<?=$pekerja['id']?>" >edit</span></a>
            <a href="<?=BASEURL?>/admin/hapus/<?=$pekerja['id']?>" onclick="return confirm('Yakin Menghapus Data?');"><span class="badge text-bg-warning">hapus</span></a>
          </div>
        </li>
      <?php endforeach ?>
    </ul>

    <!-- End of menampilkan data pekerja -->
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModalForm">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?=BASEURL?>/admin/tambah" method="POST">
        <input type="hidden" class="id" id="id" name="id">
          <!-- inputan nama -->
          <div class="mb-4">
            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
          </div>
          <!-- end of inputan nama -->

          <!-- inputan jabatan -->
          <select class="form-select mb-3" id="jabatan" aria-label="Default select example" name="jabatan"  required>
            <option value="" selected disabled>Posisi Jabatan</option>
            <option value="Project Manager">Project Manager</option>
            <option value="UI/UX Designer">UI/UX Designer</option>
            <option value="Frontend">Frontend</option>
            <option value="Backend">Backend</option>
          </select>
          <!-- end of inputan jabatan -->

          <!-- inputan alamat -->
          <div class="mb-3">
            <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>
          </div>
          <!-- end of inputan alamat -->

          <!-- inputan telepon -->
          <div class="mb-3">
            <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" maxlength="13" required>
          </div>
          <!-- end of inputan telepon -->

          <!-- inputan gender - pria/wanita -->
          <div class="gender">
          <label class="form-label">Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" value="Pria" type="radio" name="gender" id="gender_pria" required>
              <label class="form-check-label" for="flexRadioDefault1">Pria</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" value="Wanita" type="radio" name="gender" id="gender_wanita" required>
              <label class="form-check-label"  for="flexRadioDefault2">Wanita</label>
            </div>
          </div>
          <!-- end of inputan gender -->

          <!-- close and submit data -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary tombolSubmitModalForm">Save changes</button>
          </div>
          <!-- end of close and submit data -->
        </form>
      </div>
    </div>
  </div>
</div>
