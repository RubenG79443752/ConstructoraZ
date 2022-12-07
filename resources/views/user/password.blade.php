@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingrese datos para el cambio de password') }}</div>

                <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-dismissible fade show alert-success" role="alert" data-mdb-color="success" id="customxD">
                        <p>{{ $message }}</p>
                        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-dismissible fade show alert-danger" role="alert" data-mdb-color="success" id="customxD">
                        <p>{{ $message }}</p>
                        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <form method="POST" action="{{ route('updatepassword_user') }}">
                        @csrf
                        <div class="form-group">
                            <label for="mypassword">Introduzca password actual :</label>
                            <input type="password" name="mypassword" class="form-control">
                            <div class="text-danger">{{$errors->first('mypassword')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Introduce nueva password:</label>
                            <input type="password" name="password" class="form-control">
                            <div class="text-danger">{{$errors->first('password')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="mypassword">Confirma nueva password:</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Cambiar password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
