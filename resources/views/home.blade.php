@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @foreach ($gifs->data as $gif)
            <div class="col-md-3">
                <div class="card">
                    <iframe src="{{$gif->embed_url}}" id="{{$gif->id}}"></iframe>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
