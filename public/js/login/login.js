document.addEventListener('DOMContentLoaded', function() {
    let login = document.getElementById('form-login');
    login && login.addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/api/v1/auth/login", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("accept", "application/json");
        xhr.setRequestHeader('Authorization', 'Bearer ' + '1|W78STJEitii0PRGO19Lgvk688yEJCifHBdVHbybD29bf96b0');
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200 || xhr.status === 422) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.validated) {
                        toastr.success(response.message, {
                            "timeOut": 2000,
                            "extendedTimeOut": 0,
                            "preventDuplicates": true,
                            "disableTimeOut": false,
                        });

                        localStorage.setItem('token', response.token);
                        localStorage.setItem('user', response.nome);

                        setTimeout(function () {
                            window.location.href = response.redirect;
                        }, 2000);
                    } else {
                        toastr.warning(response.message, {
                            "timeOut": 2000,
                            "extendedTimeOut": 0,
                            "preventDuplicates": true,
                            "disableTimeOut": false,
                        });
                    }
                } else {
                    console.error("Erro na requisição:", xhr.status);
                }
            }
        };
        xhr.send(JSON.stringify(Object.fromEntries(formData.entries())));
    });
});
