$(document).ready(function() {

    let Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 3000
    });

    $("form#formRegistrasi").on("submit", function(e) {
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
          
          if(res == "karakter pertama harus @") {
            Toast.fire({
                icon: 'error',
                title: 'Username harus memiliki karakter @ diawal.'
            })
          }
          else if(res == "username sudah ada") {
            Toast.fire({
                icon: 'error',
                title: 'Username sudah ada.'
            })
          }
          else if(res == "minimal harus 8 karakter") {
            Toast.fire({
              icon: "error",
              title: "Password anda harus memiliki minimal 8 karakter."
            })
          }
          else if(res == "registrasi berhasil") {
            Toast.fire({
              icon: "success",
              title: "Registrasi berhasil."
            }).then(() => {
              document.location.href = "login.php";
            })

            resetForm();
          }
          else {
            Toast.fire({
              icon: "error",
              title: "Registrasi gagal. Silahkan coba lagi!"
            })
          }

        },
        error: function(res) {
          $("button[name=btn_simpan]").removeClass("disabled");

          Toast.fire({
            icon: "error",
            title: res
          })
        }

      });
    });

});

function resetForm() {
    $("input.form-control").val("");
}

function showHide() {
    
  let type = $("input[name=password]").attr("type");
  if(type == "password") {
    $("input[name=password]").attr("type", "text");
  }
  else {
    $("input[name=password]").attr("type", "password");
  }

}