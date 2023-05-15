import "./bootstrap";
import "laravel-datatables-vite";

$(document).ready(function () {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf_token]").attr("content") },
    });
    var table = $("#categoria-datatable").DataTable({
        processing: true,
        serverSide: true,
        select: true,
        ajax: `/categoria`,
        columns: [
            { data: "nome", name: "nome" },
        ],
        buttons: [
            {
                name: "novo",
                text: "Nova Categoria",
                id: "btn-categoria",
                className: "btn btn-success btn-criar-categoria",
            },
            {
                name: "editar",
                text: "Editar Categoria",
                className: "btn btn-primary",
                action: async function (e, dt, node, config) {
                    $.ajax({
                        method: "get",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: `/categoria/edit`,
                        data: {
                            id: this.row({ selected: true }).data().id,
                        },
                        success: function (data) {
                            console.log(data);
                            $(".modal-title").text(data.nome);
                            $("#action_button").val("Edit");
                            $("#categoria_form").attr(
                                "action",
                                "categoria/update/" + data.id
                            );
                            $("#form_result").html("");
                            $("#nome").val(data.nome);
                            $("#formModal").modal("show");
                        },
                    }).then(() => dt.ajax.reload());
                },
            },
            {
                name: "excluir",
                text: "Excluir Categoria",
                className: "btn btn-danger",
                action: async function (e, dt, node, config) {
                    $.ajax({
                        method: "post",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: `/categoria/delete`,
                        data: {
                            id: this.row({ selected: true }).data().id,
                        },
                    }).then(() => dt.ajax.reload());
                },
            },
        ],
    });

    $(".btn-criar-categoria").on("click", function () {
        $(".modal-title").text("Nova Categoria");
        $("#action_button").val("Add");
        $("action").val("Add");
        $("#form_result").html("");
        $("#categoira_form").attr(
            "action",
            "categoria/store"
        );
        $("#formModal").modal("show");
    });
});