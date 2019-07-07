@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body well">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Add New Partner</h1>
                        </div>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>
                        <form  action="{{ route('savePartner') }}" method="post" name="partnersForm" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label> Partner Name:</label>
                                <input type="text" name="partner_name" class="form-control form-control-user" placeholder="Product Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('partner_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Partner Logo: </label>
                                <input type="file" name="partner_logo" accept="image/*" class="form-control form-control-user">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('partner_logo')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Partner Link: </label>
                                <input type="url" name="partner_link" class="form-control form-control-user" placeholder="Product Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('partner_link')}}</span>
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
                                Save Partners Info
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection