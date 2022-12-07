<form action="{{ route('planillas.destroy',$row->id) }}" method="POST">
    <a class="btn btn-sm btn-warning" href="{{ route('planillas.edit',$row->id) }}" title="Actualizar registro"><i class="bi bi-pen-fill"></i></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar registro"><i class="bi bi-trash3-fill"></i></button>
</form>
