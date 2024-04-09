$(document).ready(function() {
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let table = $("#dataTable-candidate").DataTable({
        oLanguage: {
            sSearch         : "Pesquisar:",
            sInfo           : "Mostrando _START_ a _END_ de _TOTAL_ registros",
            sProcessing     : "Processando...",
            sZeroRecords    : "Nenhum registro encontrado",
            sInfoEmpty      : "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered   : "(Filtrados de _MAX_ registros)",
            sLengthMenu     : "Exibir _MENU_ resultados por página",
            sLoadingRecords : "Carregando...",
            oPaginate       : {
                sNext     : "Próximo",
                sPrevious : "Anterior",
                sFirst    : "Primeiro",
                sLast     : "Último"
            },
        },
        "bInfo": false,
        // processing: true,
        // serverSide: true,
        ajax: {
            "url": "/api/v1/candidate/list",
            "type": "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("accept", "application/json");
                xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('token'));
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        columns: [
            {"data": "nome", render: function(data, type, row){
                return data;
            }},
            {"data": "vagas", render: function(data, type, row){
                return `${data.length} vagas`;
            }},
            {"data": "status", render: function(data, type, row){
                return data;
            }},
            {"data": "created_at", render: function(data, type, row){
                return data;
            }},
            {"data": "updated_at", render: function(data, type, row){
                return data;
            }},
            {"data": "uuid", render: function(data, type, row){
                    return '<div class="row"><button data-uuid="'+data+'" onclick="deleted(this)" class="btn btn-default"><i class="fa fa-trash"></i></button>' +
                        '<button data-uuid="'+data+'" onclick="redirect(this)" class="btn btn-default"><i class="fa fa-edit"></i></button></div>';
            }},
        ],
    });

    $('.deleteAll').on('click', function () {
        let token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: "Tem certeza?",
            text: "Você não poderá reverter isso!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, exclua-o!",
            cancelButtonText: "Cancelar"
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/api/v1/candidate/deleteAll',
                    type: 'DELETE',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Excluído!",
                            text: "exclusão em massa realizada com sucesso.",
                            icon: "success"
                        });
                        $('#dataTable-candidate').DataTable().ajax.reload();
                    }
                });
            }
        });
    });
    $('#vaga').select2()
});

function deleted(data) {
    let token = $('meta[name="csrf-token"]').attr('content');
    let uuid = data.getAttribute('data-uuid');

    Swal.fire({
        title: "Tem certeza?",
        text: "Você não poderá reverter isso!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, exclua-o!",
        cancelButtonText: "Cancelar"
    }).then(function(result) {
        if (result.isConfirmed) {
            $.ajax({
                url: '/api/v1/candidate/delete/' + uuid,
                type: 'DELETE',
                contentType: 'application/json',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'X-CSRF-TOKEN': token
                },
                data: JSON.stringify({uuid: uuid}),
                success: function(response) {
                    Swal.fire({
                        title: "Excluído!",
                        text: "Este registro foi excluído.",
                        icon: "success"
                    });
                    $('#dataTable-candidate').DataTable().ajax.reload();
                }
            });
        }
    });
}

function redirect(data) {
    window.location.href = $('.edit').val() + '/' + data.getAttribute('data-uuid');
}
