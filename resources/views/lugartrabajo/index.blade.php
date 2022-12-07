@extends('layouts.app')

@section('template_title')
    Lugar de trabajo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lugartrabajo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('lugartrabajos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo lugar de trabajo') }}
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

										<th>Descripcion</th>
                                        <th>Latitud</th>
										<th>Longitud</th>
										<th>Radio</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lugartrabajos as $lugartrabajo)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $lugartrabajo->descripcion }}</td>
                                            <td>{{ $lugartrabajo->latitud }}</td>
											<td>{{ $lugartrabajo->logitud }}</td>
											<td>{{ $lugartrabajo->radio }}</td>
											<td>{{ $lugartrabajo->estado }}</td>

                                            <td>
                                                <form action="{{ route('lugartrabajos.destroy',$lugartrabajo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('lugartrabajos.edit',$lugartrabajo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $lugartrabajos->links() !!}
            </div>
        </div>
    </div>
@endsection
