@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">

        @foreach ($gifs['data'] as $gif)
            <div class="col-md-3">
                <div class="card mb-4">
                    <iframe src="{{$gif['embed_url']}}" id="{{$gif['id']}}"></iframe>
                </div>
            </div>
        @endforeach

    </div>

    {{ $paginator->links('vendor.pagination.bootstrap-4') }}

</div>
@endsection
