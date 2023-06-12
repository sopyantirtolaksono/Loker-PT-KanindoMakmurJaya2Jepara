$(document).ready(function() {

    let Toast = Swal.mixin({
        toast: true,
        position: 'top-center',
        showConfirmButton: false,
        timer: 3000
    });

    $("form#formUnggahBerkas").on("submit", function(e) {
      e.preventDefault();
      let formData = new FormData(this);

      $.ajax({
        type: $(this).attr("method"),
        url: $(this).attr("action"),
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
          $("button[name=btn_simpan]").addClass("disabled");
        },
        success: function(res) {
          $("button[name=btn_simpan]").removeClass("disabled");

          if(res == "format file salah") {
            Toast.fire({
              icon: 'error',
              title: 'Maaf, format file salah! Coba periksa kembali format file anda.'
            })
          }
          else if(res == "sukses menambah data baru") {
            Toast.fire({
              icon: 'success',
              title: 'Sukses! Data baru telah ditambahkan.'
            })
            resetForm();
          }
          else if(res == "data kosong, gagal menambahkan") {
            Toast.fire({
              icon: 'error',
              title: 'Maaf, ada kesalahan saat menambahkan data baru. Tidak ada data yang dikirimkan.'
            })
          }
          else {
            Toast.fire({
              icon: 'error',
              title: 'Maaf, ada kesalahan saat menambahkan data baru.'
            })
          }
        },
        error: function(res){
          $("button[name=btn_simpan]").removeClass("disabled");

          Toast.fire({
            icon: 'error',
            title: res
          })
        }
      });
    });

});

function resetForm() {
    $(".form-control").val("");
}