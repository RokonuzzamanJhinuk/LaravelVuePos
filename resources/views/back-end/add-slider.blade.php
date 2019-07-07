@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body well">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Add New Slider Image</h1>
                        </div>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>
                        <form  action="{{ route('saveSlider') }}" method="post" name="partnersForm" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label> Slider Heading Text:</label>
                                <input type="text" name="slider_heading" class="form-control form-control-user" placeholder="Product Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('slider_heading')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Slider Image: </label>
                                <input type="file" name="slider_image" accept="image/*" class="form-control form-control-user">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('slider_image')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Partner Body Text: </label>
                                <input type="text" name="slider_body" class="form-control form-control-user" placeholder="Product Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('slider_body')}}</span>
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
                                Save Slider Image
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection