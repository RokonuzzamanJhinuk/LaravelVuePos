<?php

namespace App\Http\Controllers;

use App\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;


class SliderController extends Controller
{
    public  function  addSliderImg(){
        return view('back-end.add-slider');
    }

    protected  function  sliderInfoValidate($request){
        $this->validate($request,[
            'slider_heading' => 'required',
            'slider_image' => 'required',
            'slider_body' => 'required',
            'publication' => 'required',
        ]);
    }

    protected  function  sliderInfoStore($request,$image1){
        $slider = new Sliders();

        $slider->slider_heading  =  $request->slider_heading ;
        $slider->slider_image  =  $image1;
        $slider->slider_body  =  $request->slider_body ;
        $slider->publication  =  $request->publication ;
        $slider->save();
    }

    public  function  saveSlider(Request $request){
        $this->sliderInfoValidate($request);  // request Validation
        //    $path = $request->file('product_imageF')->store('Products-Image/');
        $image1 = $request->file('slider_image');
        $imageName1 = $image1->getClientOriginalName();

        $directory = 'Product-Images/';

        $imageUrl1 = $directory.$imageName1;
//        $firstImage->move($directory,$imageNameFirst);
        $img1= Image::make($image1);
        $img1->resize(1700,600)->save($imageUrl1);

        $this->sliderInfoStore($request,$imageUrl1);

        return redirect('/sliderImg/add')->with('message','Slider Info Stored Successfully.');

    }



    public  function  manageSliderImg(){
        $sliders = DB::table('sliders')->select('sliders.*')->get();

        return view('back-end.manage-slider', ['sliders'=>$sliders]) ;

    }


    public  function  sliderUnpublished($id){
        $slider = Sliders::find($id);
        $slider->publication = 0 ;
        $slider->save();

        return redirect('/sliderImg/manage')->with('message','Slider Image Is Unpublished .');

    }

    public  function  sliderPublished($id){
        $slider = Sliders::find($id);
        $slider->publication = 1 ;
        $slider->save();

        return redirect('/sliderImg/manage')->with('message','Slider Image Is Published .');

    }


    public  function  sliderDelete($id){
        $slider = Sliders::find($id);

        $slider->delete();

        return redirect('/sliderImg/manage')->with('message','Slider Image Is Deleted .');

    }




}
