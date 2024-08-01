<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Reflector;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::with('author')->paginate(6);
        return view('books', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('create_books', compact('authors'));
    }

    public function store(Request $request)
    {
        $request = $request->validate(
            [
                'title' => ['required','string','max:255'],
                'author_id' => ['required','integer'],
                'isbn' => ['required', 'integer'],
                'published_year' => ['required','integer','min:1900','max:2100'],
            ]
            );

        Book::create($request);

        return redirect()->route('books.index');
    }

    public function edit(Book $book, Author $author) {
        $authors = Author::all();
        return view('create_books', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book) {
        $request->validate(
            [
                'title' => ['required','string','max:255'],
                'author_id' => ['required','integer'],
                'isbn' => ['required', 'integer'],
                'published_year' => ['required','integer','min:1900','max:2100'],
            ]
            );

        $book->update($request->all());

            return redirect()->route('books.index');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('books.index');
    }
}
