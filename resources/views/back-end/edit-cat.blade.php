@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Edit Category</h1>
                        </div>

                        <form  action="{{ route('catUpdate') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label> Category Name: </label>
                                <input type="text" name="cat_name" class="form-control form-control-user" value="{{ $category->cat_name }}">
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('cat_name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Category Details: </label>
                                <textarea name="cat_info" class="form-control form-control-user"> {{ $category->cat_info }} </textarea>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('cat_info')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Publication Status </label>
                                <div class="form-group">
                                    <label> <input type="radio" checked name="publication" {{ $category->publication == 1 ? 'checked' : '' }} value="1"> Published </label>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <label> <input type="radio" name="publication" {{ $category->publication == 0 ? 'checked' : '' }} value="0">Not Published </label>
                                    @if ($errors->any())
                                        <span class="text-danger"> {{$errors->first('publication')}}</span>
                                    @endif
                                </div>
                            </div>

                            <button class="btn btn-success btn-user btn-block" type="submit" name="btn" value="submit">
                                Update Category Info
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection