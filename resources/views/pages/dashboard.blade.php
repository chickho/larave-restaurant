@extends('templates.app')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <div style='padding:20px'>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($menus as $key => $menu)
                        <div class="carousel-item @if($key == 0) active @endif">
                            <img src="{{ asset('storage/' . $menu->image) }}" class="d-block" style='height:600px; width:700px'>
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class='bg-light' style='color:#000; border-radius:10px'>{{$menu->name}}</h1>
                            </div>
                        </div>
                    @endforeach;
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="position-relative">
        <div class="row">
            <div class="col-sm text-light contentDiv">
                <div class="welcomeText">
                    <h2 class="display-3 my-font text-black mb-4 mt-6" >Warunk Upnormal</h2>
                    <p class="title">Order from your favorite restaurants</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="position-relative">
    <div class="row welcome">
        <div class="col-sm text-light contentDiv">
            <div class="welcomeText">
                <h2 class="display-3 my-font text-white mb-4" >Warunk Upnormal</h2>
                <p class="title">Order from your favorite restaurants</p>
            </div>
        </div>
        <div class="col-sm backImg welcomeImg" ></div>
    </div>
</div>

    <div class="container-fluid bg-dark foodQuote">
        <h5 >“Pelopor mie kekinian.”</h5>
    </div>
@endsection