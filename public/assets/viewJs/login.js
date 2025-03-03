$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#login-form").ajaxForm({

        beforeSubmit: function () {
            
            Swal.fire({
                title: "Seja Bem-Vindo!",
                html: "Estamos validando suas informações, aguarde...",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        },
        success: function (response) {
            console.log("Login realizado com sucesso!", response);
        },
        error: function (xhr) {
            console.error("Erro ao realizar login:", xhr.responseText);

            let errorMessage = "Erro ao realizar login!";

            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }

            Swal.fire({
                title: "Oops!",
                text: errorMessage,
                icon: "error"
            });
        }
    });
});
