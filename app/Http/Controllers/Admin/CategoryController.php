<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public static function parentTree($category, $title)
    {
        if ($category->parent_id == 0) return $title;
        $parent = Category::find($category->parent_id);
        $title = $parent->title.' > '.$title;
        return CategoryController::parentTree($parent, $title);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin-side.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin-side.categories.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $data = new Category();
        $data->title = $request->title;
        $data->parent_id = $request->parent_id;
        $data->description = $request->description;
        $data->keywords = $request->keywords;
        $data->save();
        return redirect()->route('admin.categories');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin-side.categories.show', [
            'category' => $category,
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin-side.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Category::find($id);
        $data->title = $request->title;
        $data->parent_id = $request->parent_id;
        $data->description = $request->description;
        $data->keywords = $request->keywords;
        $data->save();
        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        $data =Category::find($id);
        $data->delete();
        return redirect()->route('admin.categories');
    }
}
