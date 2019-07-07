@extends('master')

@section('body')
    <div class="container" >

        <div class="card">

            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h1 class="text-success ">Manage Basic Company Info</h1>
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table justify-content-center table-bordered col-12">
                            <tr class="text-center bg-dark">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Hot-Line</th>
                                <th>Manager</th>
                                <th>Logo</th>
                                <th>About</th>
                                <th>Address</th>
                                <th>FB Page</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($basicInfos as $product)

                                <tr class="text-center">
                                    <td> {{ $product->id }}</td>
                                    <td>{{ $product->company_name }}</td>
                                    <td>{{ $product->company_hotLine }}</td>
                                    <td>{{ $product->manager_cell }}</td>
                                    <td>
                                        <img src="{{ asset($product->company_logo) }}" alt="" height="50" width="50">
                                    </td>
                                    <td>{{ $product->aboutUs_info }}</td>
                                    <td>{{ $product->company_address  }}</td>
                                    <td>{{ $product->fb_page }}</td>
                                    <td>

                                        <a href="{{ route('basicInfoDelete',['id'=>$product->id]) }}" title="Delete Company Info." class="btn btn-danger btn-md">
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