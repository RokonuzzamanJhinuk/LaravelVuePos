<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Brands;
use App\Category;
use App\Partners;
use App\Products;
use App\Sliders;
use Illuminate\Http\Request;

class PhpLv1 extends Controller
{
    public  function  home(){
        $newProducts = Products::where('publication',1)
            ->orderBy('id','DESC')
            ->take(8)
            ->get();
        $sliders = Sliders::where('publication',1)->get();

        $partners = Partners::where('publication',1)->take(6)->get();

        $topRates = Products::where('publication',1)->max('product_price');

        $ad = Ads::where('publication',1)->first();

        return view('front-end.index',[
            'newProducts'=>$newProducts,
            'sliders'  => $sliders,
            'partners'  => $partners,
            'topRates'  => $topRates,
            'ad'  => $ad,
        ]);
    }



}
