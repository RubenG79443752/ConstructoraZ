<form action="{{ route('personals.destroy',$row->id) }}" method="POST">
    <a class="btn btn-sm btn-success" title="Editar datos" href="{{ route('personals.edit',$row->id) }}"><i class="bi bi-eraser-fill"></i></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar datos de personal"><i class="bi bi-trash"></i></button>
</form>
