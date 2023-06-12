$(document).ready(function() {

    let Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 3000
    });

    $("form#formLogin").on("submit", function(e) {
      e.preventDefault();
      let formData = new FormData(this);

      $.ajax({
        type: $(this).attr("method"),
        url: $(this).attr("action"),
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
          $("button[name=btn_submit]").addClass("disabled");
        },
        success: function(res) {
          $("button[name=btn_submit]").removeClass("disabled");

          if(res == "login sukses") {
            document.location.href = "index.php?halaman=dashboard";
          }
          else if(res == "level user tidak diketahui") {
            Toast.fire({
              icon: "error",
              title: "Maaf, level user anda tidak diketahui."
            })
          }
          else if(res == "akun tidak ditemukan") {
            Toast.fire({
              icon: "error",
              title: "Maaf, akun tidak ditemukan. Coba cek kembali username & password anda."
            })
          }
          else {
            Toast.fire({
              icon: "error",
              title: "Maaf, ada kesalahan saat login. Silahkan coba lagi!"
            })
          }

        },
        error: function(res) {
          $("button[name=btn_submit]").removeClass("disabled");

          Toast.fire({
            icon: "error",
            title: res
          })
        }

      });
    });

});


function showHide() {
    
  let type = $("input[name=password]").attr("type");
  if(type == "password") {
    $("input[name=password]").attr("type", "text");
  }
  else {
    $("input[name=password]").attr("type", "password");
  }

}