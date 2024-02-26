<div class="d-flex justify-content-center" style="gap: .8em">
    <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary btn-sm">edit</a>
    <a href="{{route('admin.user.show', $user->id)}}" class="btn btn-info btn-sm">detail</a>
    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
    
        <button type="submit" class="btn btn-danger btn-sm btn-delete">delete</button>
    </form>    
</div>