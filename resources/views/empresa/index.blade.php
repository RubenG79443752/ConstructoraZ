@extends('layouts.app')

@section('template_title')
    Empresa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empresa') }}
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Logo</th>
										<th>Razon Social</th>
										<th>N Nit</th>
										<th>N Identificador</th>
										<th>N Empleador Caja</th>
										<th>Nim</th>
										<th>Repre Legal</th>
										<th>Ci Repre Legal</th>
										<th>Direccion</th>
										<th>Telefono</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td><img src="{{ asset('storage/'.$empresa->logo) }}" alt="" width="90"></td>
											<td>{{ $empresa->razon_social }}</td>
											<td>{{ $empresa->n_nit }}</td>
											<td>{{ $empresa->n_identificador }}</td>
											<td>{{ $empresa->n_empleador_caja }}</td>
											<td>{{ $empresa->nim }}</td>
											<td>{{ $empresa->repre_legal }}</td>
											<td>{{ $empresa->ci_repre_legal }}</td>
											<td>{{ $empresa->direccion }}</td>
											<td>{{ $empresa->telefono }}</td>

                                            <td align="right">
                                                <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empresas.show',$empresa->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empresas.edit',$empresa->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $empresas->links() !!}
            </div>
        </div>
    </div>
@endsection
