<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function __construct(){
        
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::latest()->paginate(3);
        return view('admin.categories.allcategories',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.addcategory');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:100'
        ]
        ,
        [
            'category_name.required' => 'type any thing',
            'category_name.unique'   => 'name is repeat',
            'category_name.max'      => 'too much ',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->route('categories')->with('message','the category is added');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit( $id)
    {
        $category = Category::find($id);
        return view('admin.categories.categoryedit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([

        'category_name' => $request->category_name,
        'user_id'       => Auth::user()->id,

        ]);

        return redirect()->route('categories')->with('message','the category is updated');
    }

    public function SoftDelete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories')->with('message','the category is deleted');
    }



    public function deletedcategories()
    {
        $trashedcategories = Category::onlyTrashed()->paginate(3);
        return view('admin.categories.softdeleted',compact('trashedcategories'));
    }

    public function restore( $id)
    {
        $category = Category::withTrashed()->find($id);
        $category->restore();

        return redirect()->route('categories')->with('message','the category is restore');
    }
    
    public function harddelete($id)
    {
        $category = Category::withTrashed()->find($id);
        $category->forceDelete();

        return redirect()->back()->with('message','the category is deleted');
    }

}
