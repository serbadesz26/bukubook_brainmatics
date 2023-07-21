@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Detail of User</h3>
            </div>
            <div class="card-body">
                <h4>Book that you created</h4>
                <p>Total books: {{ $user->books_count }}</p>
                <p>Total stock: {{ $user->books->sum('quantity') }}</p>
                <div class="row">
                    @forelse($user->books as $key => $book)
                    <div class="col-md-2">
                        <img src="{{ $book->cover_url }}"
                            class="img-thumbnail"
                            style="width: 200px"/>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <strong class="text-center">You have not create any book</strong>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
