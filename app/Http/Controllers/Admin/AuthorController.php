<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function index()
    {
        $authors = Author::all();
        return view('admin-side.authors.index', [
            'authors' => $authors
        ]);
    }

    public function create()
    {
        return view('admin-side.authors.create');
    }

    public function store(Request $request)
    {
        $data = new Author();
        $data->name = $request->name;
        $data->birth = $request->birth;
        $data->death = $request->death;
        $data->bio = $request->bio;
        $data->save();
        return redirect()->route('admin.authors');
    }

    public function show($id)
    {
        $author = Author::find($id);
        return view('admin-side.authors.show', [
            'author' => $author
        ]);
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('admin-side.authors.edit', [
            'author' => $author
        ]);
    }
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        $author->name = $request->name;
        $author->birth = $request->birth;
        $author->death = $request->death;
        $author->bio = $request->bio;
        $author->save();
        return redirect()->route('admin.authors');
    }

    public function destroy($id)
    {
        $data =Author::find($id);
        $data->delete();
        return redirect()->route('admin.authors');
    }
}
