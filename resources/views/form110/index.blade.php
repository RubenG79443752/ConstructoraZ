@extends('layouts.app')

@section('template_title')
    Formularios 110
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Formularios 110') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('form110s.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Subir formulario 110') }}
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
										<th>Descripcion</th>
										<th>Mes</th>
										<th>Periodo</th>
										<th>Monto a Favor</th>
										<th>Formulario 110</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($form110s as $form110)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $form110->personal->nombre.' '.$form110->personal->primer_apellido.' '.$form110->personal->segundo_apellido }}</td>
											<td>{{ $form110->descripcion }}</td>
											<td>{{ $form110->mes }}</td>
											<td>{{ $form110->periodo }}</td>
											<td>{{ $form110->monto_favor }}</td>
											<td><a href="{{ asset('storage/'.$form110->form110) }}" class="btn btn-warning btn-sm" target="_blank">ver PDF</a></td>

                                            <td>
                                                <form action="{{ route('form110s.destroy',$form110->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('form110s.edit',$form110->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $form110s->links() !!}
            </div>
        </div>
    </div>
@endsection
