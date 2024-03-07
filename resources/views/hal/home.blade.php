@extends('layouts.main')

@section('content')
@if (Auth::user() && Auth::user()->level == "banned")
<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    h1 {
        margin: 0;
        font-size: 2.5em;
        color: #ff0000;
    }
</style>
<h1>Anda Telah Dibanned</h1>
@else
    <div class="container mb-5 mt-5">

        <!-- Gambar 1 -->
        @if ($posts->count() > 0)
        <div class="gallery-item">
            @foreach ($posts as $post)
                <div class="gambar">
                    <a href="/detail/{{ $post->gambar }}">
                        <img src="\storage\img\{{ $post->gambar }}">
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
    @endif
@endsection
