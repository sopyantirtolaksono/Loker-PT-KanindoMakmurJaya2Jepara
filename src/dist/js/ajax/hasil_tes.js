$(document).ready(function() {

  // Toast SweetAlert
  let Toast = Swal.mixin({
    toast: true,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000
  });

  // Jika data disubmit/disimpan
  $("form#formHasilTes").on("submit", function(e) {
    e.preventDefault();

    let nama = $("input[name=nama]").val();
    if(nama === "") {
      Toast.fire({
        icon: 'error',
        title: 'Pilih lowongan terlebih dahulu!'
      })
    } 
    else {
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
          else if(res == "data sudah ada") {
            Toast.fire({
              icon: 'error',
              title: 'Maaf, Data sudah diinput.'
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
    }

  });

  // Load nama
  $("select[name=lowongan]").on("click", function() {
    let val = $(this).val();
    $("div#loadNama").load("src/components/ajax/load_nama.php?id=" + val);
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
    $("select[name=status],input[name=hasil_tes").val("");
}