@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="m-0 font-weight-bold text-primary">Editar de vagas</h6>
                <button type="button" class="edit d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Salvar Registro</button>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <form autocomplete="off" id="form-edit">
                        <input type="hidden" name="uuid" id="uuid" value="{{ $data->uuid }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Nome</label>
                                <input type="text" class="form-control" value="{{ $data->nome }}" id="nome" name="nome">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="regime">Regime Trabalhista</label>
                                <select id="regime" name="regime" class="form-control">
                                    <option value="nenhum">Selecione</option>
                                    <option value="CLT" {{ $data->regime === 'CLT' ? 'selected' : '' }}>CLT</option>
                                    <option value="Juridica" {{ $data->regime === 'Juridica' ? 'selected' : '' }}>Pessoa Jurídica</option>
                                    <option value="Freelancer" {{ $data->regime === 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="nenhum">Selecione</option>
                                    <option value="Ativo" {{ $data->status === 'Ativo' ? 'selected' : '' }}>Ativo</option>
                                    <option value="Pausado" {{ $data->status === 'Pausado' ? 'selected' : '' }}>Pausado</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('js/demo/datatables-vacancy.js') }}"></script>
    <script src="{{ asset('js/admin/vacancy/vacancy.js') }}"></script>
@endpush
