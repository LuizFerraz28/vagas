@extends('layout')

@section('conteudo')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<meta name="csrf-token" content="<?= csrf_token() ?>">
@csrf
<div class="titulo">
    <h1 class="display-6">Empresas</h1>
</div>
<div class="card-body">


    <div class="table-responsive">
        <br>
        <table class="table table-bordered table-striped " id="empresa-datatable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>dono_id</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>dono_id</th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="empresa_form" class="form-horizontal" action="{{ route('emp.store') }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Nova Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <div class="form-group">
                        <label>Nome : </label>
                        <input type="text" name="nome" id="nome" class="form-control" />
                    </div>
                    <div>
                        <label for="select-dono">Selecione o dono</label>
                        <select id="usuario_id" name="usuario_id" class="form-select" aria-label="Default select example">
                            <?php
                            foreach ($usuario as $u) {
                            ?>

                                <option value="<?= $u->id ?>"><?= $u->nome ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="action_button" id="action_button" value="Add" class="btn btn-info" />
                </div>
            </form>
        </div>
    </div>
</div>



@push('scripts')
@endpush
@endsection