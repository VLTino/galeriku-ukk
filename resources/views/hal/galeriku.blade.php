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

    <h1>Galeriku</h1>
    <div class="gallery-item2">
           

        <div class="gambar"> <a href="/detail"><img src="/img/tokyo1.png"></a></div>
        <div class="gambar"> <a href="/detail"><img src="/img/tokyo2.png"></a></div>
        <div class="gambar"> <a href="/detail"><img src="/img/tokyo3.jpg"></a></div>
        <div class="gambar"> <a href="/detail"><img src="/img/tokyo4.jpg"></a></div>
        <div class="gambar"> <a href="/detail"><img src="/img/sololeveling.png"></a></div>
        <div class="gambar"> <a href="/detail"><img src="/img/midnight.png"></a></div>
        <div class="gambar"> <a href="/detail"><img src="/img/tokyo3.jpg"></a></div>
        <div class="gambar"> <a href="/detail"><img src="/img/tokyo4.jpg"></a></div>
        <div class="gambar"> <a href="/detail"><img src="/img/tokyo1.png"></a></div>
            
       


    </div>
</div>
@endsection