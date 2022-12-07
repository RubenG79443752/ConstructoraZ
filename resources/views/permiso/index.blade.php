@extends('layouts.app')

@section('template_title')
    Permisos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Permiso') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('permisos.create') }}" class="btn btn-warning float-right"  data-placement="left">
                                    <i class="bi bi-person-badge-fill"></i> {{ __('Crear Permisos') }}
                                </a>
                              </div>
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

										<th>Personal</th>
                                        <th>Justificativo</th>
										<th>Tipo Permiso</th>
										<th>Descripcion</th>
										<th>Desde Fecha</th>
										<th>Hasta Fecha</th>
										<th>Horas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permisos as $permiso)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $permiso->personal->nombre.' '.$permiso->personal->primer_apellido.' '.$permiso->personal->segundo_apellido }}</td>
                                            <td><a href="{{ asset('storage/'.$permiso->justificativo) }}" class="btn btn-warning btn-sm" target="_blank">ver PDF</a></td>
											<td>{{ $permiso->tipo_permiso }}</td>
											<td>{{ $permiso->descripcion }}</td>
											<td>{{ $permiso->desde_fecha }}</td>
											<td>{{ $permiso->hasta_fecha }}</td>
											<td>{{ $permiso->horas }}</td>

                                            <td>
                                                <form action="{{ route('permisos.destroy',$permiso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('permisos.edit',$permiso->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $permisos->links() !!}
            </div>
        </div>
    </div>
@endsection
