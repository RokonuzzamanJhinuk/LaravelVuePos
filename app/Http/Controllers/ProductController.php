<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Category;
use App\Products;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public  function  addProduct(){
        $categories = Category::where('publication',1)->get();
        $brands = Brands::where('publication',1)->get();

//        return view('back-end.add-product',[
//            'categories' => $categories,
//            'brands' => $brands,
//        ]);

        return view('back-end.add-product')->with([
            'categories'  => $categories ,
            'brands'  => $brands
        ]);
    }
    protected  function  productInfoValidate($request){
        $this->validate($request,[
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required|max:30|min:2',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'short_info' => 'required',
            'long_info' => 'required',
//            'product_imageF' => 'required',
//            'product_imageS' => 'required',
            'publication' => 'required',
        ]);
    }

    protected  function  productInfoStore($request,$imageUrlF,$imageUrlS){
        $product = new Products();

        $product->category_id  =  $request->category_id ;
        $product->brand_id  =  $request->brand_id ;
        $product->product_name  =  $request->product_name ;
        $product->product_price  =  $request->product_price ;
        $product->product_quantity  =  $request->product_quantity ;
        $product->short_info  =  $request->short_info ;
        $product->long_info  =  $request->long_info ;
        $product->product_imageF  =  $imageUrlF ;
        $product->product_imageS  =  $imageUrlS ;
        $product->publication  =  $request->publication ;
        $product->save();
    }


    public  function  saveProduct(Request $request){

        $this->productInfoValidate($request);
    //    $path = $request->file('product_imageF')->store('Products-Image/');
        $productImageF = $request->file('product_imageF');
        $imageNameF = $productImageF->getClientOriginalName();
        $productImageS = $request->file('product_imageS');
        $imageNameS = $productImageS->getClientOriginalName();
        $directory = 'Product-Images/';

        $imageUrlF = $directory.$imageNameF;
//        $productImageF->move($directory,$imageNameF);
        Image::make($productImageF)->resize(400,400)->save($imageUrlF);


        $imageUrlS = $directory.$imageNameS;
//        $productImageS->move($directory,$imageNameS);
        Image::make($productImageS)->resize(400,400)->save($imageUrlS);

        $this->productInfoStore($request,$imageUrlF,$imageUrlS);

        return redirect('/product/add')->with('message','Product Info Stored Successfully.');


    }

    public  function  manageProduct(){

        $products = DB::table('products')
            ->join('categories','products.category_id' ,'=' ,'categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.cat_name','brands.brand_name')
            ->get();

        return view('back-end.manage-product',['products'=>$products]);
    }

    public function  productView($id){
        $product = Products::find($id);

        return view('back-end.show-product',['product'=>$product]);
    }

    public  function  productUnp($id){
        $products = Products::find($id);
        $products->publication = 0 ;
        $products->save();

        return redirect('/product/manage')->with('message','Product Is Unpublished .');

    }

    public  function  productPub($id){
        $product = Products::find($id);
        $product->publication = 1 ;
        $product->save();

        return redirect('/product/manage')->with('message','Product Is Published .');

    }

    public  function  productEdit($id){
        $product = Products::find($id) ;

        $categories = Category::where('publication',1)->get();
        $brands = Brands::where('publication',1)->get();

        return view('back-end.edit-product')->with([
            'categories'  => $categories ,
            'brands'  => $brands,
            'product' => $product
            ]);
    }

    public function updateProduct(Request $request){
        $this->productInfoValidate($request);

        //    $path = $request->file('product_imageF')->store('Products-Image/');
        $productImageF = $request->file('product_imageF');
        $imageNameF = $productImageF->getClientOriginalName();
        $productImageS = $request->file('product_imageS');
        $imageNameS = $productImageS->getClientOriginalName();
        $directory = 'Product-Images/';
        $imageUrlF = $directory.$imageNameF;
        Image::make($imageUrlF)->resize(400,400)->save($imageUrlF);
//        $productImageF->move($directory,$imageNameF);
        $imageUrlS = $directory.$imageNameS;
        Image::make($imageUrlS)->resize(400,400)->save($imageUrlS);
//        $productImageS->move($directory,$imageNameS);

        $this->productInfoStore($request,$imageUrlF,$imageUrlS);

        return redirect('/product/manage')->with('message','Product Info Updated Successfully.');

    }

    public  function  productDelete($id){
        $product = Products::find($id) ;

        $product->delete();
        return redirect('/product/manage')->with('message','Product Deleted Successfully .');

    }



}
