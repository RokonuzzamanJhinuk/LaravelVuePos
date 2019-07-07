@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Add Basic Information</h1>
                        </div>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>

                        <form  action="{{ route('saveBasicInfo') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label> Company Name: </label>
                                <input type="text" name="company_name" class="form-control form-control-user" placeholder="Company Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('company_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Company Hot-line: </label>
                                <input type="tel" name="company_hotLine" class="form-control form-control-user" placeholder="Company Hot-line Number.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('company_hotLine')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Company  E-Mail: </label>
                                <input type="email" name="manager_cell" class="form-control form-control-user" placeholder="Company E-Mail Address.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('manager_cell')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Company Logo: </label>
                                <input type="file" name="company_logo" accept="image/*" class="form-control form-control-user">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('company_logo')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Facebook Page URL: </label>
                                <input type="url" name="fb_page" class="form-control form-control-user" placeholder="Company Facebook Url.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('fb_page')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Twitter URL: </label>
                                <input type="text" name="twitter_page" class="form-control form-control-user" placeholder="Company Twitter Url.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('twitter_page')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Google Plus URL: </label>
                                <input type="text" name="gPlus_page" class="form-control form-control-user" placeholder="Company Google Plus Url.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('gPlus_page')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Linked In URL: </label>
                                <input type="text" name="linkedIn_page" class="form-control form-control-user" placeholder="Company Linked In  Url.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('linkedIn_page')}}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Company Address: </label>
                                <textarea name="company_address" class="form-control form-control-user" value="" placeholder="Company Full Address"></textarea>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('company_address')}}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>About Your Business: </label>
                                <textarea name="aboutUs_info" class="form-control form-control-user" value="" placeholder="Company About Details."></textarea>
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('aboutUs_info')}}</span>
                                @endif
                            </div>

                            <button class="btn btn-success btn-user btn-block" type="submit" name="btn" value="submit">
                                Save Basic Info
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection