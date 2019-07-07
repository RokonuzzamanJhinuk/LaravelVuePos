<?php

namespace App\Http\Controllers;

use App\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;


class PartnersController extends Controller
{
    public  function  addPartner(){
        return view('back-end.add-partner');
    }


    protected  function  partnerInfoValidate($request){
        $this->validate($request,[
            'partner_name' => 'required',
            'partner_logo' => 'required',
            'partner_link' => 'required',
            'publication' => 'required',
        ]);
    }

    protected  function  adsInfoStore($request,$image1){
        $partner = new Partners();

        $partner->partner_name  =  $request->partner_name ;
        $partner->partner_logo  =  $image1;
        $partner->partner_link  =  $request->partner_link ;
        $partner->publication  =  $request->publication ;
        $partner->save();
    }



    public function  savePartner(Request $request){

        $this->partnerInfoValidate($request);  // request Validation
        //    $path = $request->file('product_imageF')->store('Products-Image/');
        $image1 = $request->file('partner_logo');
        $imageName1 = $image1->getClientOriginalName();

        $directory = 'Product-Images/';

        $imageUrl1 = $directory.$imageName1;
//        $firstImage->move($directory,$imageNameFirst);
        $img1= Image::make($image1);
        $img1->resize(600,600)->save($imageUrl1);

        $this->adsInfoStore($request,$imageUrl1);

        return redirect('/partner/add')->with('message','Partners Info Stored Successfully.');

    }



    public  function  managePartner(){
        $partners = DB::table('partners')->select('partners.*')->get();

        return view('back-end.manage-partner', ['partners'=>$partners]) ;
    }

    public  function  partnerUnpublished($id){
        $partners = Partners::find($id);
        $partners->publication = 0 ;
        $partners->save();

        return redirect('/partner/manage')->with('message','Partner Is Unpublished .');

    }

    public  function  partnerPublished($id){
        $partners = Partners::find($id);
        $partners->publication = 1 ;
        $partners->save();

        return redirect('/partner/manage')->with('message','Partner Is Published .');

    }

    public  function  partnerDelete($id){
        $partners = Partners::find($id);

        $partners->delete();

        return redirect('/partner/manage')->with('message','Partner Is Deleted Successfully .');

    }

}
