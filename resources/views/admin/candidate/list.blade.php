@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="m-0 font-weight-bold text-primary">Listagem de Candidatos</h6>
                <div class="row">
                    <button class="deleteAll d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mr-2">Excluir Todos</button>
                    <a href="{{ route('candidate.new') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Novo Registro</a>
                </div>
                <input type="hidden" class="edit" name="edit" id="edit" value="{{ route('candidate.edit', []) }}">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable-candidate" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Vagas</th>
                            <th>Status</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                            <th>Excluir</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('js/demo/datatables-candidate.js') }}"></script>
    <script src="{{ asset('js/admin/candidate/candidate.js') }}"></script>
@endpush
