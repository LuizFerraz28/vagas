import "./bootstrap";
import "laravel-datatables-vite";

$(document).ready(function () {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf_token]").attr("content") },
    });
    var table = $("#empresa-datatable").DataTable({
        processing: true,
        serverSide: true,
        select: true,
        ajax: `/emp`,
        columns: [
            { data: "nome", name: "nome" },
            { data: "usuario_id", name: "usuario_id" },
        ],
        buttons: [
            {
                name: "novo",
                text: "Nova Empresa",
                id: "btn-empresa",
                className: "btn btn-success btn-criar-empresa",
            },
            {
                name: "editar",
                text: "Editar Empresa",
                className: "btn btn-primary",
                action: async function (e, dt, node, config) {
                    $.ajax({
                        method: "get",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: `/emp/edit`,
                        data: {
                            id: this.row({ selected: true }).data().id,
                        },
                        success: function (data) {
                            console.log(data);
                            $(".modal-title").text(data.nome);
                            $("#action_button").val("Edit");
                            $("#empresa_form").attr(
                                "action",
                                "emp/update/" + data.id
                            );
                            $("#form_result").html("");
                            $("#nome").val(data.nome);
                            $("#usuario_id").val(data.usuario_id);
                            $("#formModal").modal("show");
                        },
                    }).then(() => dt.ajax.reload());
                },
            },
            {
                name: "excluir",
                text: "Excluir Empresa",
                className: "btn btn-danger",
                action: async function (e, dt, node, config) {
                    $.ajax({
                        method: "post",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: `/emp/delete`,
                        data: {
                            id: this.row({ selected: true }).data().id,
                        },
                    }).then(() => dt.ajax.reload());
                },
            },
        ],
    });

    $(".btn-criar-empresa").on("click", function () {
        $(".modal-title").text("Nova empresa");
        $("#action_button").val("Add");
        $("action").val("Add");
        $("#form_result").html("");
        $("#empresa_form").attr(
            "action",
            "emp/store"
        );
        $("#formModal").modal("show");
    });
});
