<!-- resources/views/create_author.blade.php -->
@extends('welcome')

@section('content')
<div class="container">
    <h1>{{ isset($author) ? 'Modifier l\'Auteur' : 'Créer un Nouvel Auteur' }}</h1>
    
    <form action="{{ isset($author) ? route('authors.update', $author->id) : route('authors.store') }}" method="POST">
        @csrf
        @if(isset($author))
            @method('PUT')
        @endif
        
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $author->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="biography">Biographie</label>
            <textarea name="biography" id="biography" class="form-control" rows="4" required>{{ old('biography', $author->biography ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($author) ? 'Mettre à Jour' : 'Créer' }}</button>
    </form>
</div>
@endsection
