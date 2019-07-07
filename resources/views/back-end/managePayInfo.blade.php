@extends('master')

@section('body')
    <div class="container" >

        <div class="card">

            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h1 class="text-success ">Manage All Payment Info.</h1>
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table justify-content-center table-bordered">
                            <tr class="text-center bg-dark">
                                <th>Id</th>
                                <th>Bank Name</th>
                                <th>Short Form</th>
                                <th>Bank Url</th>
                                <th>Bank Logo</th>
                                <th>Ac Holder Name</th>
                                <th>Account Number</th>
                                <th>Account Type</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($payInfos as $product)

                                <tr class="text-center">
                                    <td> {{ $product->id }}</td>
                                    <td>{{ $product->bank_name }}</td>
                                    <td>{{ $product->bankShort_name }}</td>
                                    <td>{{ $product->bank_url }}</td>
                                    <td>
                                        <img src="{{ asset($product->bank_logo) }}" alt="" height="50" width="50">
                                    </td>
                                    <td>{{ $product->acHolder_name }}</td>
                                    <td>{{ $product->account_no  }}</td>
                                    <td>{{ $product->account_type }}</td>
                                    <td>

                                        <a href="{{ route('payInfoDelete',['id'=>$product->id]) }}" class="btn btn-danger btn-md">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr/>
    <hr/>
@endsection