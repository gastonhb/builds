<td class="col text-end">
    <a href="/{{$href}}/{{ $element->id }}/edit" class="btn mx-auto">
        <i class="fa-solid fa-pen text-body-tertiary"></i>
    </a>
    <form action="{{ route ($href . '.destroy', $element->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn mx-auto">
            <i class="fa-solid fa-trash text-body-tertiary"></i>
        </button>
    </form> 
</td>