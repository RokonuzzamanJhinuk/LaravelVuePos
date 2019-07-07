<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Category;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AdsController extends Controller
{
    public  function  addModels(){
        $categories = Category::where('publication',1)->get();

        return view('back-end.add-model',['categories'  => $categories]);
    }



    protected  function  adsInfoValidate($request){
        $this->validate($request,[
            'cat_id' => 'required',
            'firstAds_name' => 'required',
            'firstAds_img' => 'required',
            'secAds_name' => 'required',
            'secAds_img' => 'required',
            'thirdAds_name' => 'required',
            'thirdAds_img' => 'required',
            'publication' => 'required',
        ]);
    }


    public  function  saveAds(Request $request){


        $this->adsInfoValidate($request);  // request Validation
        //    $path = $request->file('product_imageF')->store('Products-Image/');
        $image1 = $request->file('firstAds_img');
        $imageName1 = $image1->getClientOriginalName();
        $image2 = $request->file('secAds_img');
        $imageName2 = $image2->getClientOriginalName();
        $image3 = $request->file('thirdAds_img');
        $imageName3 = $image3->getClientOriginalName();

        $directory = 'Product-Images/';

        $imageUrl1 = $directory.$imageName1;
//        $firstImage->move($directory,$imageNameFirst);
        $img1= Image::make($image1);
        $img1->resize(600,600)->save($imageUrl1);

        $imageUrl2 = $directory.$imageName2;
//        $secondImage->move($directory,$imageNameSecond);
        Image::make($image2)->resize(400,400)->save($imageUrl2);

        $imageUrl3 = $directory.$imageName3;
//        $thirdImage->move($directory,$imageNameThird);
        Image::make($image3)->resize(400,400)->save($imageUrl3);


        $this->adsInfoStore($request,$imageUrl1,$imageUrl2,$imageUrl3);


        return redirect('/adsModels/add')->with('message','Ads Info Stored Successfully.');
    }


    protected  function  adsInfoStore($request,$image1,$image2,$image3){
        $ad = new Ads();

        $ad->cat_id  =  $request->cat_id ;
        $ad->firstAds_name  =  $request->firstAds_name ;
        $ad->firstAds_img  =  $image1;
        $ad->secAds_name  =  $request->secAds_name ;
        $ad->secAds_img  =  $image2;
        $ad->thirdAds_name  =  $request->thirdAds_name ;
        $ad->thirdAds_img  =  $image3;
        $ad->publication  =  $request->publication ;
        $ad->save();
    }



    public  function  manageModels(){
        $ads = DB::table('ads')
            ->join('categories','ads.cat_id' ,'=' ,'categories.id')
            ->select('ads.*','categories.cat_name')
            ->get();

        return view('back-end.manage-model',['ads'=>$ads]);
    }

    public  function  adsUnpublished($id){
        $ads = Ads::find($id);
        $ads->publication = 0 ;
        $ads->save();

        return redirect('/adsModels/manage')->with('message','Ad Is Unpublished .');
    }

    public  function  adsPublished($id){
        $ads = Ads::find($id);
        $ads->publication = 1 ;
        $ads->save();

        return redirect('/adsModels/manage')->with('message','Ad Is Published .');
    }

    public  function  adsDelete($id){
        $ads = Ads::find($id);
        $ads->delete();

        return redirect('/adsModels/manage')->with('message','Ad Is Deleted Successfully.');
    }




}
