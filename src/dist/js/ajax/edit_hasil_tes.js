$(document).ready(function() {

  // Toast SweetAlert
  let Toast = Swal.mixin({
    toast: true,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000
  });

  $("form#formEditHasilTes").on("submit", function(e) {
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
        
        if(res == "sukses mengedit data") {
          Toast.fire({
            icon: 'success',
            title: 'Sukses! Data telah diedit.'
          }).then(() => {
              document.location.href = "index.php?halaman=unggahan_hasil_tes";
          })
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
            title: 'Maaf, ada kesalahan saat mengedit data.'
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