@extends('layouts.app')

@section('template_title')
    Listado de variables
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Variables') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('variables.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva variable') }}
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
										<th>Valor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($variables as $variable)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $variable->descripcion }}</td>
											<td>{{ $variable->valor }}</td>

                                            <td align="right">
                                                <form action="{{ route('variables.destroy',$variable->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('variables.show',$variable->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('variables.edit',$variable->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $variables->links() !!}
            </div>
        </div>
    </div>
@endsection
