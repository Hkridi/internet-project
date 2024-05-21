<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
        return view('admin-side.books.index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        $authors = Author::all();
        return view('admin-side.books.create', [
            'authors' => $authors
        ]);
    }

    public function store(Request $request)
    {
        $data = new Book();
        $data->title = $request->title;
        $data->isbn = $request->isbn;
        $data->author_id = $request->author_id;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->language = $request->language;
        $data->publication_year = $request->publication_year;
        $data->edition = $request->edition;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.books');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('admin-side.books.show', [
            'book' => $book,
        ]);
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin-side.books.edit', [
            'book' => $book
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Book::find($id);
        $data->title = $request->title;
        $data->isbn = $request->isbn;
        $data->author_id = $request->author_id;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->language = $request->language;
        $data->publication_year = $request->publication_year;
        $data->edition = $request->edition;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.books');
    }

    public function destroy($id)
    {
        $data =Book::find($id);
        $data->delete();
        return redirect()->route('admin.books');
    }
}
