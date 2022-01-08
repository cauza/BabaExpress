<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    // Daftar Category
    public function index()
    {
        $category = Category::with(['parent'])->orderBy('created_at', 'DESC')->paginate(10);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view('admin.categories.index', compact('category', 'parent'));
    }

    // Create New Category
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories'
        ]);

        $request->request->add(['slug' => $request->name]);
        Category::create($request->except('_token'));
        return redirect(route('category.index'))->with(['success' => 'Kategori Baru Ditambahkan!']);
    }

    // Edit Category
    public function edit($id)
    {
        $category = Category::find($id);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view('admin.categories.edit', compact('category', 'parent'));
    }

    // Update Category
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories,name,' . $id
        ]);

        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return redirect(route('category.index'))->with(['success' => 'Kategori Diperbaharui!']);
    }

    // Delete Category
    public function destroy($id)
    {
        $category = Category::withCount(['child', 'product'])->find($id);
        if ($category->child_count == 0 && $category->product_count == 0) {
            $category->delete();
            return redirect(route('category.index'))->with(['success' => 'Kategori Dihapus!']);
        }
        return redirect(route('category.index'))->with(['error' => 'Kategori ini memiliki anak kategori atau memiliki produk!']);
    }
}
