<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //

    public function index()
    {
        // Récupérer tous les auteurs avec leurs livres associés
        $authors = Author::with('books')->get();
        return view('author', compact('authors'));
    }

    public function create()    
    {
        return view('create_author');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'biography' => ['required', 'string', 'max: 255'],
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index')->with('success','Author created successfully');
    }

    public function edit(Author $author)
    {
        return view('create_author', compact('author'));
    }
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'biography' => ['required', 'string', 'max: 255'],
        ]);

        $author->update($request->all());
        return redirect()->route('authors.index');
    }

    public function destroy(Author $author) 
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
}
