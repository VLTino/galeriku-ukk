@extends('layouts.main')
<style>
    body {
    margin: 0;
    padding: 0;
}
</style>
@include('layouts.sidebar')

@section('content')
<div class="content mt-5">

    <h1>Likes</h1>
    @if ($likes->count() > 0)
    <div class="gallery-item2">
        @foreach ($likes as $like)
            <div class="gambar">
                <a href="/detail/{{ $like->post->gambar }}">
                    <img src="\storage\img\{{ $like->post->gambar }}">
                </a>
            </div>
        @endforeach
    </div>
    @else
    <div class="d-flex justify-content-center align-content-center text-danger">
        <h1 style="width: 100%;text-align: center">No Images Found</h1>
    </div>
    @endif
</div>
@endsection