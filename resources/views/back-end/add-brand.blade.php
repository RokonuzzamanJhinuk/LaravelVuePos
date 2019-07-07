@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Add New Brand</h1>
                        </div>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>

                        <form  action="{{ route('addBrand') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label> Brand Name: </label>
                                <input type="text" name="brand_name" class="form-control form-control-user" required placeholder="Brand Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('brand_name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Brand Details: </label>
                                <textarea name="brand_info" class="form-control form-control-user" required placeholder="Brand Details"></textarea>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('brand_info')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Publication Status </label>
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
                                Save Brand Info
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection