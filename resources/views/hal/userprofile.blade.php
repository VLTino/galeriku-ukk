@extends('layouts.main')

@section('content')
    <div class=" container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="header col-12">
            <h1>Profile</h1>
        </div>

        <div class="container d-flex justify-content-center align-items-center detail">
            @if ($user && $user->photo_profile)
                <img src="\storage\profile_photos\{{ $user->photo_profile }}" alt="" class="img-detail img-fluid"
                    style="border-radius: 50%;width: 150px;height: 150px;">
            @else
                <!-- Display a default image or message if $user is null -->
                <img src="/default/pp.jpg" alt="Default Image" class="img-detail img-fluid" style="border-radius: 50%;width: 150px;height: 150px;">
            @endif
        </div>
        <div class="container d-flex justify-content-center align-items-center ">
            <h1>{{ $user->user->name }}</h1>
        </div>
        <div class="container d-flex justify-content-center align-items-center">
            <a href="{{ $user->link_acc }}">{{ $user->link_acc }}</a>
        </div>
        <div class="container d-flex justify-content-center align-items-center ">
        <p>{{ $user->describe_profile }}</p>
        </div>
<h3>Upload</h3>
        @if ($user->user->posts->count() > 0)
        <div class="gallery-item2">
            @foreach ($user->user->posts as $post)
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
@endsection
