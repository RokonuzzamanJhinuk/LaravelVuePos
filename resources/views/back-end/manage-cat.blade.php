@extends('master')

@section('body')
    <div class="container" >

        <div class="card">

                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-10">
                        <div class="text-center card-header">
                            <h1 class="text-success ">Manage All Category</h1>
                            <h4 class="text-success">{{ Session::get('message') }}</h4>
                        </div>
                        <div class="card-body">
                            <table class="table justify-content-center table-bordered col-12">
                                <tr class="text-center bg-dark">
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Category Information</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                @php($i=1)
                                @foreach($categories as $category)
                                <tr class="text-center">
                                    <td>{{$i++}}</td>
                                    <td>{{ $category->cat_name }}</td>
                                    <td>{{ $category->cat_info }}</td>
                                    <td>{{ $category->publication == 1 ? 'Published': 'Unpublished' }}</td>
                                    <td>
                                        @if($category->publication == 1)
                                            <a href="{{ route('catUnp',['id'=>$category->id]) }}" class="btn btn-success btn-md">
                                                <i class="fas fa-arrow-circle-up fa-sm"></i>
                                            </a>
                                        @elseif($category->publication == 0)
                                            <a href="{{ route('catPub',['id'=>$category->id]) }}" class="btn btn-warning btn-md">
                                                <i class="fas fa-arrow-circle-down fa-sm"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('catEdit',['id'=>$category->id]) }}" class="btn btn-primary btn-md">
                                            <i class="fas fa-edit fa-sm"></i>
                                        </a>

                                        <a href="{{ route('catDelete',['id'=>$category->id]) }}" class="btn btn-danger btn-md">
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