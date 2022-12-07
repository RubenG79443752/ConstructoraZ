<form action="{{ route('contratacions.destroy',$row->id) }}" method="POST">
    <a class="btn btn-sm btn-primary " href="{{ route('contratacions.show',$row->id) }}" title="Detalle"><i class="bi bi-eye"></i></a>
    <a class="btn btn-sm btn-success" href="{{ route('contratacions.edit',$row->id) }}" title="Editar"><i class="bi bi-pencil-square"></i></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="bi bi-trash3-fill"></i></button>
</form>
