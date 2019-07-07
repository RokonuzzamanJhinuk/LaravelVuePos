@extends('master')

@section('body')
    <div class="container" >

        <div class="card">

            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h1 class="text-success ">Manage All Brands</h1>
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table justify-content-center table-bordered col-12">
                            <tr class="text-center bg-dark">
                                <th>Id</th>
                                <th>Brand Name</th>
                                <th>Brand Information</th>
                                <th>Publication Status</th>
                                <th>Actions</th>
                            </tr>
                            @php($i=1)
                            @foreach($brands as $brand)
                                <tr class="text-center">
                                    <td>{{$i++}}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->brand_info }}</td>
                                    <td>{{ $brand->publication == 1 ? 'Published': 'Unpublished' }}</td>
                                    <td>
                                        @if($brand->publication == 1)
                                            <a href="{{ route('brandUnp',['id'=>$brand->id]) }}" class="btn btn-success btn-md">
                                                <i class="fas fa-arrow-circle-up fa-sm"></i>
                                            </a>
                                        @elseif($brand->publication == 0)
                                            <a href="{{ route('brandPub',['id'=>$brand->id]) }}" class="btn btn-warning btn-md">
                                                <i class="fas fa-arrow-circle-down fa-sm"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('brandEdit',['id'=>$brand->id]) }}" class="btn btn-primary btn-md">
                                            <i class="fas fa-edit fa-sm"></i>
                                        </a>

                                        <a href="{{ route('brandDelete',['id'=>$brand->id]) }}" class="btn btn-danger btn-md">
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