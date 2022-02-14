<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $req)
    {
        $category = new Category();
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }
        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == 'on' ? 1 : 0;
        $category->popular = $req->input('popular') == 'on' ? 1 : 0;
        $category->meta_title = $req->input('meta_title');
        $category->meta_descrip = $req->input('meta_descrip');
        $category->meta_keywords = $req->input('meta_keywords');

        $category->save();

        return redirect('/list-categories')->with('status', 'Category Added Successfully');
    }

    public function update(Request $req)
    {
        $category = Category::find($req->input('id'));

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }
        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == 'on' ? 1 : 0;
        $category->popular = $req->input('popular') == 'on' ? 1 : 0;
        $category->meta_title = $req->input('meta_title');
        $category->meta_descrip = $req->input('meta_descrip');
        $category->meta_keywords = $req->input('meta_keywords');

        $category->save();

        return redirect('/list-categories')->with('status', 'Category Updated Successfully');
    }

    public function show()
    {
        $categories = Category::all();

        return view('admin.category.list', compact('categories'));
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect('/list-categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }
}
