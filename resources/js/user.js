import "./bootstrap";
import "laravel-datatables-vite";

$(document).ready(function () {
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf_token]").attr("content") },
    });
    var table = $("#usuario-datatable").DataTable({
        processing: true,
        serverSide: true,
        select: true,
        ajax: `/user`,
        columns: [
            { data: "nome", name: "nome" },
        ],
        buttons: [
            {
                name: "novo",
                text: "Novo Usuario",
                id: "btn-user",
                className: "btn btn-success btn-criar-usuario",
            },
            {
                name: "editar",
                text: "Editar Usuario",
                className: "btn btn-primary",
                action: async function (e, dt, node, config) {
                    $.ajax({
                        method: "get",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: `/user/edit`,
                        data: {
                            id: this.row({ selected: true }).data().id,
                        },
                        success: function (data) {
                            console.log(data);
                            $(".modal-title").text(data.nome);
                            $("#action_button").val("Edit");
                            $("#usuario_form").attr(
                                "action",
                                "user/update/" + data.id
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
                text: "Excluir Usuario",
                className: "btn btn-danger",
                action: async function (e, dt, node, config) {
                    $.ajax({
                        method: "post",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: `/user/delete`,
                        data: {
                            id: this.row({ selected: true }).data().id,
                        },
                    }).then(() => dt.ajax.reload());
                },
            },
        ],
    });

    $(".btn-criar-usuario").on("click", function () {
        $(".modal-title").text("Novo Usuario");
        $("#action_button").val("Add");
        $("action").val("Add");
        $("#form_result").html("");
        $("#usuario_form").attr(
            "action",
            "user/store"
        );
        $("#formModal").modal("show");
    });
});