@extends('welcome')

@section('content')
<a href="{{route('authors.index')}}">Voir les auteurs</a>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    @foreach ($books as $book)
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="card-text">
                    {{ $book->title }}<br>
                    <small class="text-muted">{{ $book->author->name }}</small>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                        
                        <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Etes vous sûr de supprimer  ce livre?')" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $books->links()}}

</div>
@endsection
