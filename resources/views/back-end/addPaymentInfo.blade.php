@extends('master')

@section('body')
    <div class="container" >

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h1 class="h4 text-success mb-4">Add Payment Account Info.</h1>
                        </div>
                        <h6 class="text-success text-center">{{ Session::get('message') }} </h6>

                        <form  action="{{ route('savePaymentInfo') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label> Bank Name: </label>
                                <input type="text" name="bank_name" class="form-control form-control-user" placeholder="Bank  Name">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('bank_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Bank Short Form: </label>
                                <input type="text" name="bankShort_name" class="form-control form-control-user" placeholder="Bank Short form.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('bankShort_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Bank Website Url: </label>
                                <input type="url" name="bank_url" class="form-control form-control-user" placeholder="Bank Website  Url.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('bank_url')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Bank Logo: </label>
                                <input type="file" name="bank_logo" accept="image/*" class="form-control form-control-user">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('bank_logo')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Account Holder Name: </label>
                                <input type="text" name="acHolder_name" class="form-control form-control-user" placeholder="Account Holder Name.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('acHolder_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Account Number: </label>
                                <input type="text" name="account_no" class="form-control form-control-user" placeholder="Bank Account Number.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('account_no')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Account Type: </label>
                                <input type="text" name="account_type" class="form-control form-control-user" placeholder="Bank Account Type.">
                                @if ($errors->any())
                                    <span class="text-danger"> {{$errors->first('account_type')}}</span>
                                @endif
                            </div>


                            <button class="btn btn-success btn-user btn-block" type="submit" name="btn" value="submit">
                                Save Payment Info
                            </button>

                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection