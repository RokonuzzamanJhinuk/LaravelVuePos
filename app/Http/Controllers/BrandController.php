<?php

namespace App\Http\Controllers;

use App\Brands;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public  function  addBrand(){
        return view('back-end.add-brand');
    }

    public  function  manageBrand(){
        $brands = Brands::all();
        return view('back-end.manage-brand',['brands'=>$brands]);
    }

    public  function  saveBrand(Request $request){
        $request->validate([
            'brand_name' => 'required|max:30|min:2|alpha_dash',

            'brand_info'  => 'required|max:255|min:5|alpha_dash',

            'publication'  => 'required'
        ]);

        $brands = new Brands();

        $brands->brand_name = $request->brand_name ;
        $brands->brand_info = $request->brand_info ;
        $brands->publication = $request->publication ;
        $brands->save();

        return redirect('/brand/add')->with('message','Brand Inserted Successfully .') ;
    }

    public  function  brandUnp($id){
        $brand = Brands::find($id);
        $brand->publication = 0 ;
        $brand->save();

        return redirect('/brand/manage')->with('message','Brand Is Unpublished .');
    }

    public  function  brandPub($id){
        $brand = Brands::find($id);
        $brand->publication = 1 ;
        $brand->save();
        return redirect('/brand/manage')->with('message','Brand Is Published .');
    }

    public  function  brandEdit($id){
        $brands = Brands::find($id);
        return view('back-end.edit-brand',['brands'=>$brands]);
    }

    public  function  brandUpdate(Request $request){
        $request->validate([
            'brand_name' => 'required|max:30|min:2|alpha_dash',

            'brand_info'  => 'required|max:255|min:5|alpha_dash',

            'publication'  => 'required'
        ]);

        $brand = Brands::find($request->id);

        $brand->brand_name = $request->brand_name ;
        $brand->brand_info = $request->brand_info ;
        $brand->publication = $request->publication ;
        $brand->save();

        return redirect('/brand/manage')->with('message','Brand Updated Successfully .') ;
    }

    public  function  brandDelete($id){
        $brand = Brands::find($id);

        $brand->delete();
        return redirect('/brand/manage')->with('message','Brand Deleted Successfully .');
    }
}
