<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30',
            'module'=>'required|max:30',
        ]);
        $category = new Category;
        $category->name = e($request->name);
        $category->module = e($request->module);
        $category->slug = Str::slug($request->name);

        $category->save();
        return redirect()->route('categories.index')->with('info','Agregado correctamente');
    }

   
    public function show(Category $category)
    {
        //
    }

   
    public function edit($id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:categories|max:30',
            'module'=>'required|max:30',
        ]);
        $category = Category::findOrFail($id);
        $category->name = e($request->name);
        $category->module = e($request->module);
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route('categories.index')->with('info','Actualizado correctamente');
    }

    
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        return back()->with('info','se ha eliminado correctamente');
    }
}
