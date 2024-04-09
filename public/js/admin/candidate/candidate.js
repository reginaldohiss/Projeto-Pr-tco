document.addEventListener('DOMContentLoaded', function() {
    let save = document.querySelector('.save');
    save && save.addEventListener('click', function () {
        let nome = document.getElementById('nome').value;
        let vaga = Array.from(document.getElementById('vaga').selectedOptions).map(option => option.value);
        let status = document.getElementById('status').value;
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (nome.length === 0){
            Swal.fire({
                title: "Ops...",
                text: "nome é de preenchimento obrigatório!",
                icon: "error"
            });
        }

        if (vaga.length === 0){
            Swal.fire({
                title: "Ops...",
                text: "Vaga é de preenchimento obrigatório!",
                icon: "error"
            });
        }

        if (status === 'nenhum'){
            Swal.fire({
                title: "Ops...",
                text: "Status é de preenchimento obrigatório!",
                icon: "error"
            });
        }

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/api/v1/candidate/create', true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("accept", "application/json");
        xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('token'));
        xhr.setRequestHeader('X-CSRF-TOKEN', token);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                let response = JSON.parse(xhr.responseText);
                Swal.fire({
                    icon: "success",
                    title: "Seu trabalho foi salvo",
                    showConfirmButton: false,
                    timer: 1500
                });

                setTimeout(function () {
                    window.location.href = response.data.redirect;
                }, 1500)
            }
        };

        xhr.send(JSON.stringify({
            nome, vaga, status
        }));
    });

    let edit = document.querySelector('.edit');
    edit && edit.addEventListener('click', function () {
        let nome = document.getElementById('nome').value;
        let vaga = Array.from(document.getElementById('vaga').selectedOptions).map(option => option.value);
        let status = document.getElementById('status').value;
        let uuid = document.getElementById('uuid').value;
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (nome.length === 0){
            Swal.fire({
                title: "Ops...",
                text: "nome é de preenchimento obrigatório!",
                icon: "error"
            });
        }

        if (vaga === 0){
            Swal.fire({
                title: "Ops...",
                text: "Vaga é de preenchimento obrigatório!",
                icon: "error"
            });
        }

        if (status === 'nenhum'){
            Swal.fire({
                title: "Ops...",
                text: "Status é de preenchimento obrigatório!",
                icon: "error"
            });
        }

        let xhr = new XMLHttpRequest();
        xhr.open('PUT', `/api/v1/candidate/update/${uuid}`, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("accept", "application/json");
        xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('token'));
        xhr.setRequestHeader('X-CSRF-TOKEN', token);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                let response = JSON.parse(xhr.responseText);
                Swal.fire({
                    icon: "success",
                    title: "Seu trabalho foi salvo",
                    showConfirmButton: false,
                    timer: 1500
                });

                setTimeout(function () {
                    window.location.href = response.data.redirect;
                }, 1500)
            }
        };

        xhr.send(JSON.stringify({
            nome, vaga, status
        }));
    });
});
