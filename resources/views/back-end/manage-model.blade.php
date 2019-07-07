@extends('master')

@section('body')
    <div class="container" >

        <div class="card">

            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h1 class="text-success ">Manage All Products</h1>
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table justify-content-center table-bordered col-12 table-responsive">
                            <tr class="text-center bg-dark">
                                <th>Id</th>
                                <th>Ads Category </th>
                                <th>Ad One Name </th>
                                <th>Ad Image</th>
                                <th>Ad Two Name </th>
                                <th>Ad Image</th>
                                <th>Ad Three Name</th>
                                <th>Ad Image</th>
                                <th>Publication</th>
                                <th>Actions</th>
                            </tr>
                            @php($i=1)
                            @foreach($ads as $ad)

                                <tr class="text-center">
                                    <td> {{ $i++ }}</td>
                                    <td>{{ $ad->cat_name }}</td>
                                    <td>{{ $ad->firstAds_name }}</td>
                                    <td>
                                        <img src="{{ asset($ad->firstAds_img) }}" alt="" height="80" width="80">
                                    </td>
                                    <td>{{ $ad->secAds_name }}</td>
                                    <td>
                                        <img src="{{ asset($ad->secAds_img) }}" alt="" height="80" width="80">
                                    </td>
                                    <td>{{ $ad->thirdAds_name }}</td>
                                    <td>
                                        <img src="{{ asset($ad->thirdAds_img) }}" alt="" height="80" width="80">
                                    </td>

                                    <td>{{ $ad->publication }}</td>

                                    <td>

                                        @if($ad->publication == 1)
                                            <a href="{{ route('adsUnpublished',['id'=>$ad->id]) }}" class="btn btn-success btn-md">
                                                <i class="fas fa-arrow-circle-up fa-sm"></i>
                                            </a>
                                        @elseif($ad->publication == 0)
                                            <a href="{{ route('adsPublished',['id'=>$ad->id]) }}" class="btn btn-warning btn-md">
                                                <i class="fas fa-arrow-circle-down fa-sm"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('adsDelete',['id'=>$ad->id]) }}" class="btn btn-danger btn-md">
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