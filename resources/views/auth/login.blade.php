@extends('auth.layout.app')

@section('content')
    <div class="row justify-content-center mt-auto">
        <div class="col-xl-6 col-lg-6 col-md-6" style="margin-top: 200px">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0" >
                    <div class="row" >
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bem vindo de volta!</h1>
                                </div>
                                <form class="user" id="form-login" autocomplete="off">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                               id="email" name="email" aria-describedby="emailHelp"
                                               placeholder="Insirao endereço de e-mail...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="password" name="password" placeholder="Senha">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Lembre de mim</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Conecte-se
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
