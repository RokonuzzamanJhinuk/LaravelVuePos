<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected  $fillable = ['cat_id','firstAds_name','firstAds_img','secAds_name','secAds_img','thirdAds_name','thirdAds_img','publication'];
}
