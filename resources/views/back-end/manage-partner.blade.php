@extends('master')

@section('body')
    <div class="container" >

        <div class="card">

            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="text-center card-header">
                        <h1 class="text-success ">Manage All Partners</h1>
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table justify-content-center table-bordered col-12">
                            <tr class="text-center bg-dark">
                                <th>Id</th>
                                <th>Partner Name</th>
                                <th>Partner Logo</th>
                                <th>Partner Link</th>
                                <th>Publication</th>
                                <th>Actions</th>
                            </tr>
                            @php($i=1)
                            @foreach($partners as $ad)

                                <tr class="text-center">
                                    <td> {{ $i++ }}</td>

                                    <td>{{ $ad->partner_name }}</td>
                                    <td>
                                        <img src="{{ asset($ad->partner_logo) }}" alt="" height="80" width="80">
                                    </td>

                                    <td>{{ $ad->partner_link }}</td>

                                    <td>{{ $ad->publication }}</td>

                                    <td>

                                        @if($ad->publication == 1)
                                            <a href="{{ route('partnerUnpublished',['id'=>$ad->id]) }}" class="btn btn-success btn-md">
                                                <i class="fas fa-arrow-circle-up fa-sm"></i>
                                            </a>
                                        @elseif($ad->publication == 0)
                                            <a href="{{ route('partnerPublished',['id'=>$ad->id]) }}" class="btn btn-warning btn-md">
                                                <i class="fas fa-arrow-circle-down fa-sm"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('partnerDelete',['id'=>$ad->id]) }}" class="btn btn-danger btn-md">
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