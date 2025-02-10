<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use function Illuminate\Validation\validate;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
        ]);
        Category::newCategory($request);
        return back()->with('message', 'Category info save successfully');
    }

    public function edit($id)
    {
        return view('admin.category.edit', ['category' => Category::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category/index')->with('message', 'Category info update successfully');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return back()->with('delete-message', 'Category info deleted successfully');
    }
}
