<div>
    <form method="POST" action="{{ $action }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">DELETE</button>
    </form>
</div>
