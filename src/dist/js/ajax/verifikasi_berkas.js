$(document).ready(function() {

  let Toast = Swal.mixin({
    toast: true,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000
  });

  $("form#formVerifikasiBerkas").on("submit", function(e) {
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
            title: 'Sukses! Berkas terverifikasi.'
          }).then(() => {
              document.location.href = "index.php?halaman=berkas_pelamar";
          })
          
        }
        else if(res == "data kosong") {
          Toast.fire({
            icon: 'error',
            title: 'Maaf, ada kesalahan saat verifikasi berkas. Tidak ada data yang dikirimkan.'
          })
        }
        else {
          Toast.fire({
            icon: 'error',
            title: 'Maaf, ada kesalahan saat verifikasi berkas.'
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

// script select2
// $(function() {
  // Initialize Select2 Elements
  // $('.select2').select2()

  // Initialize Select2 Elements
  // $('.select2bs4').select2({
  //   theme: 'bootstrap4'
  // })
// });