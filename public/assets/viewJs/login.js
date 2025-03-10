$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#login-form").ajaxForm({
        type: "POST",
        dataType: "JSON",
        beforeSubmit: function () {
            Swal.fire({
                title: "Aguarde!",
                html: "Estamos validando suas informações, aguarde...",
                timer: 1000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        },
        success: function (response) {

            if (response.status_code === 200) {

                Swal.fire({
                    title: "Bem-vindo!",
                    text: "Redirecionando...",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false,
                    timerProgressBar: true,
                }).then(() => {
                    window.location.href = "/home";
                });
    
            } else {
                Swal.fire({
                    title: "Erro ao realizar login!",
                    text: response.error,
                    icon: "error"
                });
            }
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            Swal.fire({
                title: "Erro inesperado!",
                text: "Não foi possível processar a requisição.",
                icon: "error"
            });
        }
    });
});
