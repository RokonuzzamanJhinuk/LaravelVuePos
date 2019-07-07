<?php

namespace App\Providers;

use App\basicInfo;
use App\Brands;
use App\Category;
use App\Products;
use Darryldecode\Cart\Cart;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*',function ($view){
            $view->with('allCategories', Category::where('publication',1)->get());
        });

        View::composer('*',function ($view){
            $view->with('allBrands', Brands::where('publication',1)->get());
        });

        View::composer('*',function ($view){
            $view->with('allProducts', Products::where('publication',1)->get());
        });

        View::composer('*',function ($view){
            $view->with('basicInfo', basicInfo::all()->first());
        });


//        View::composer('*',function ($view){
//            $view->with('totalItems', Cart::getTotalQuantity());
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
