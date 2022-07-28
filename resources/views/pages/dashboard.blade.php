@extends('templates.app')
@section('content')
<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($menus as $index => $slide )
            @if($index == 0)
            <div class="carousel-item active" data-interval="1000">
                <img src="{{ \Storage::url($slide->image) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $slide->name }}</h5>
                    <p>{{ $slide->category }}</p>
                </div>
            </div>
            @else
            <div class="carousel-item" data-interval="1000">
                <img src="{{ \Storage::url($slide->image) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $slide->name }}</h5>
                    <p>{{ $slide->category }}</p>
                </div>
            </div>
            @endif
        @endforeach 
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endsection