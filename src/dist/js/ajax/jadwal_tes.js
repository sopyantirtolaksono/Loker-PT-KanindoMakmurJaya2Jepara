$(document).ready(function() {

  // Toast SweetAlert
  let Toast = Swal.mixin({
    toast: true,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000
  });

  // Date range picker
  $('#tanggal').datetimepicker({
      format: 'YYYY-MM-DD',
      timePicker: false
  });

  // Timepicker
  $('#waktu').datetimepicker({
    format: 'hh:mm'  
  });

  $("form#formJadwalTes").on("submit", function(e) {
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

        if(res == "sukses menambah data baru") {
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
      error: function(res) {
        $("button[name=btn_simpan]").removeClass("disabled"); 

        Toast.fire({
          icon: 'error',
          title: res
        })
      }
    });
  });
  
});

// Script Select2
// $(function() {
  // Initialize Select2 Elements
  // $('.select2').select2()

  // Initialize Select2 Elements
  // $('.select2bs4').select2({
  //   theme: 'bootstrap4'
  // })
// });

// Function reset form
function resetForm() {
    $("input.form-control,textarea.form-control").val("");
}