$(function () {
  $(".tombolModalFormTambahData").on("click", function () {
    $("#judulModalForm").html("Tambah Data Pekerja");
    $(".tombolSubmitModalForm").html("Simpan Data");
    $("#nama").val(data.nama);
    $("#jabatan").val(data.jabatan);
    $("#alamat").val(data.alamat);
    $("#telepon").val(data.telepon);
    $("#id").val(data.id);
    if ((data.gender = "Pria")) {
      $("#gender_pria").prop("checked", false);
    } else if ((data.gender = "Wanita")) {
      $("#gender_wanita").prp("checked", false);
    }
  });

  $(".tombolModalFormEditData").on("click", function () {
    $("#judulModalForm").html("Ubah Data Pekerja");
    $(".tombolSubmitModalForm").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/self/team_kita/public/admin/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/self/team_kita/public/admin/getUbah",
      data: { id: id },
      method: "POST",
      dataType: "JSON",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#jabatan").val(data.jabatan);
        $("#alamat").val(data.alamat);
        $("#telepon").val(data.telepon);
        $("#id").val(data.id);
        if ((data.gender = "Pria")) {
          $("#gender_pria").prop("checked", true);
        } else if ((data.gender = "Wanita")) {
          $("#gender_wanita").prp("checked", true);
        }

        // console.log(data);
      },
    });
  });
});
