@extends('layouts.app')
@section('content')
{{-- Carousel section --}}
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.unsplash.com/photo-1512113569142-8a60fccc7caa?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fG1vdmllJTIwcG9zdGVyfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
        <div class="carousel-caption d-block d-md-block"style="top: 40vh !important;">
            <h1>First slide label</h1>
            <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1512113569142-8a60fccc7caa?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fG1vdmllJTIwcG9zdGVyfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
        <div class="carousel-caption d-block d-md-block"style="top:40vh !important;">
            <h1>First slide label</h1>
            <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1512113569142-8a60fccc7caa?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fG1vdmllJTIwcG9zdGVyfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
        <div class="carousel-caption d-block d-md-block" style="top:40vh !important;">
            <h1>First slide label</h1>
            <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
{{-- Carousel section ends --}}
{{-- Categories Section --}}
    <div class="container-fluid py-5" style="padding: 0px 50px;">
        <div class="row">
            <div class="col-12 pb-4">
                <div style="border-bottom : 1px solid rgb(31, 31, 31);">
                    <h1 class="category-title p-0 m-0" style="color: yellow">
                        New Movies
                    </h1>
                    <h6 class="subtitle">Recently added.</h6>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 pb-4">
                <div class="card movie" data-aos="fade-up">
                    <img src="https://images.unsplash.com/photo-1512113569142-8a60fccc7caa?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fG1vdmllJTIwcG9zdGVyfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="...">
                    <div class="card-body align-self-center">
                      <h5 class="card-title">Card title</h5>
                      <a href="#" class="btn movie-btn">somewhere</a>
                      <a href="#" class="btn movie-btn-tranparent card-button">somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 pb-4">
                <div class="card movie">
                    <img src="https://images.unsplash.com/photo-1595804850773-4a3fe3444a71?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fG1vdmllJTIwcG9zdGVyfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="...">
                    <div class="card-body align-self-center">
                      <h5 class="card-title">Card title</h5>
                      <a href="#" class="btn movie-btn">somewhere</a>
                      <a href="#" class="btn movie-btn-tranparent card-button">somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 pb-4">
                <div class="card movie"></div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 pb-4">
                <div class="card movie"></div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 pb-4">
                <div class="card movie"></div>
            </div>
        </div>
    </div>
    @endsection