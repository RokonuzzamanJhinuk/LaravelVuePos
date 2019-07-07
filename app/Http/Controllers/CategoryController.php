<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public  function  addCat(){
        return view('back-end.add-cat');
    }


    public  function  saveCat(Request $request){
        $request->validate([
            'cat_name' => 'required|max:30|min:2|alpha_dash',

            'cat_info'  => 'required|max:255|min:5|alpha_dash',

            'publication'  => 'required'
        ]);

        $category = new Category();

        $category->cat_name = $request->cat_name ;
        $category->cat_info = $request->cat_info ;
        $category->publication = $request->publication ;
        $category->save();

        return redirect('/category/add')->with('message','Category Inserted Successfully .') ;
    }

    public  function  manageCat(){
        $categories  = Category::all();
        return view('back-end.manage-cat',['categories'=>$categories]);
    }

    public  function  unpublishedCat($id){
        $category = Category::find($id);
        $category->publication = 0 ;
        $category->save();

        return redirect('/category/manage')->with('message','Category Is Unpublished .');
    }

    public  function  publishedCat($id){
        $category = Category::find($id);
        $category->publication = 1 ;
        $category->save();

        return redirect('/category/manage')->with('message','Category Is Published .');
    }

    public  function  editCat($id){
        $category = Category::find($id) ;

        return view('back-end.edit-cat',['category'=>$category]);
    }

    public  function  updateCat(Request $request){
        $request->validate([
            'cat_name' => 'required|max:30|min:2|alpha_dash',

            'cat_info'  => 'required|max:255|min:5|alpha_dash',

            'publication'  => 'required'
        ]);

        $category = Category::find($request->id) ;

        $category->cat_name = $request->cat_name ;
        $category->cat_info = $request->cat_info ;
        $category->publication = $request->publication ;
        $category->save();

        return redirect('/category/manage')->with('message','Category Updated Successfully .');

    }

    public  function  deleteCat($id){
        $category = Category::find($id) ;

        $category->delete();
        return redirect('/category/manage')->with('message','Category Deleted Successfully .');

    }
}
