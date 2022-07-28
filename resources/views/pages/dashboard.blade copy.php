@extends('templates.app')
@section('content')
    {{-- <div class="jumbotron"> --}}
        <div class="position-relative">
            <div class="row welcome">
                <div class="col-sm backImg welcomeImg "></div>
                <div class="col-sm text-light contentDiv">
                    <div class="welcomeText">
                        <h2 class="display-3 my-font text-white mb-4" >Warunk Upnormal </h2>
                        <p class="title">Pelopor mie kekinian</p>
                    </div>
                </div>
            </div>
            <div class="row welcomeCards">
               <div class="d-flex justify-content-around">
                <div class="card" style="min-width:25%;min-height:200px">
                    <img src="/img/minOrder.svg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                      <h5 class="card-title ">Instagramable</h5>
                      <p class="card-text">Capture your precious moments in the present moment</p>
                    </div>
                </div>
                <div class="card" style="min-width:25%;min-height:200px">
                    <img src="/img/liveLoc.svg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                      <h5 class="card-title">We can be found anywhere</h5>
                      <p class="card-text">Know where your order is at all times, from the restaurant to your doorstep</p>
                    </div>
                </div>
                <div class="card" style="min-width:25%;min-height:200px">
                    <img src="/img/onTheWay.svg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                      <h5 class="card-title">Quality service</h5>
                      <p class="card-text">Experience Swiggy's superfast delivery for food delivered fresh & on time</p>
                    </div>
                </div>
               </div>
            </div>
            <div class="row welcome">
                <div class="col-sm text-light contentDiv">
                    <div class="welcomeText">
                        <h2 class="display-3 my-font text-white mb-4" >Our Restaurant in your pocket </h2>
                        <p class="title">Order from your favorite restaurants & track on the go, with the all-new Swiggy app.</p>
                    </div>
                </div>
                <div class="col-sm backImg welcomeImg" ></div>
            </div>
        </div>
    {{-- </div> --}}

    <div class="container-fluid bg-dark foodQuote">
        <h5 >“One cannot think well, love well, sleep well, if one has not dined well.”</h5>
    </div>
@endsection