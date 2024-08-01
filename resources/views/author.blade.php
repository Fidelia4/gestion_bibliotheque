<!-- resources/views/authors/index.blade.php -->
@extends('welcome') <!-- ou le nom de votre layout principal -->

@section('content')
<div class="container">
    <h1 class="my-4">Liste des Auteurs</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($authors as $author)
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $author->name }}</h5>
                    <p class="card-text">{{ Str::limit($author->biography, 100, '...') }}</p>
                    
                    <h6 class="mt-3">Livres de cet Auteur :</h6>
                    <ul class="list-unstyled">
                        @forelse ($author->books as $book)
                            <li>{{ $book->title }}</li>
                        @empty
                            <li>Aucun livre disponible</li>
                        @endforelse
                    </ul>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="btn-group">
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet auteur ?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
