<!-- resources/views/books/book-form.blade.php -->

@extends('welcome')

@section('content')
    <div class="container">
        <h1>{{ isset($book) ? 'Modifier le Livre' : 'Créer un Nouveau Livre' }}</h1>
        
        <form action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}" method="POST">
            @csrf
            @if(isset($book))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="author_id">Auteur</label>
                <select name="author_id" id="author_id" class="form-control" required>
                    <option value="">Choisir un auteur</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ (isset($book) && $book->author_id == $author->id) ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn', $book->isbn ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="published_year">Année de Publication</label>
                <input type="number" name="published_year" id="published_year" class="form-control" value="{{ old('published_year', $book->published_year ?? '') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($book) ? 'Mettre à Jour' : 'Créer' }}</button>
        </form>
    </div>
@endsection
