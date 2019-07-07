@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body well">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Add New Product</h1>
                        </div>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>
                        <form  action="{{ route('saveAds') }}" method="post" name="adsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label> Ads Category: </label>
                                <select class="form-control" name="cat_id">
                                    <option> ----- Select Category Name -----</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('category_id')}}</span>
                                @endif
                            </div>


                            <h3 class="card-header well"> First Ads </h3>
                            <div class="form-group">
                                <label> 1st Ads Title: </label>
                                <input type="text" name="firstAds_name" class="form-control form-control-user" placeholder="Product Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('firstAds_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Ads Image: </label>
                                <input type="file" name="firstAds_img" accept="image/*" class="form-control form-control-user">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('firstAds_img')}}</span>
                                @endif
                            </div>

                            <h3 class="card-header well"> Second Ads </h3>
                            <div class="form-group">
                                <label> 2nd Ads Title: </label>
                                <input type="text" name="secAds_name" class="form-control form-control-user" placeholder="Product Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('secAds_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Ads Image: </label>
                                <input type="file" name="secAds_img" accept="image/*" class="form-control form-control-user">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('secAds_img')}}</span>
                                @endif
                            </div>


                            <h3 class="card-header well"> Third Ads </h3>
                            <div class="form-group">
                                <label> 3rd Ads Title: </label>
                                <input type="text" name="thirdAds_name" class="form-control form-control-user" placeholder="Product Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('thirdAds_name')}}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label> Ads Image: </label>
                                <input type="file" name="thirdAds_img" accept="image/*" class="form-control form-control-user">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('thirdAds_img')}}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Publication Status: </label>
                                <div class="form-group">
                                    <label> <input type="radio" checked name="publication" value="1"> Published </label>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <label> <input type="radio" name="publication" value="0">Not Published </label>
                                    @if ($errors->any())
                                        <span class="text-danger"> {{$errors->first('publication')}}</span>
                                    @endif
                                </div>
                            </div>

                            <button class="btn btn-success btn-user btn-block" type="submit" name="btn" value="submit">
                                Save Ads Info
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection