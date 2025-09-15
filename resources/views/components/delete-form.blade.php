<form action="{{ $action }}" method="POST" class="d-inline-block delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" role="submit" class="btn btn-sm btn-danger-transparent delete-button">حذف</button>
</form>
