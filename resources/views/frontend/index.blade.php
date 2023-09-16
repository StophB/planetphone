@extends('layouts.app')

@section('title','Home Page')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide">

    <div class="carousel-inner">

        @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                @if ($slider->image)
                <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1 class="text-dark">
                            {!! $slider->title !!}
                        </h1>
                        <p class="text-muted">{!! $slider->description !!}</p>
                        <div>
                            <a href="#" class="btn btn-slider btn-warning">
                                Obtenir maintenant
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center">Bienvenue sur PlanetPhone</h4>
                <div class="underline mx-auto"></div>
                <ul>
                    <li>
                        <b>NOUVEAUTÉ 100% -</b> Chez nous vous trouverez tous les nouveaux produits du marché
                    </li>
                    <li>
                        <b>LIVRAISON RAPIDE -</b> Livraison partout au Maroc en 48H
                    </li>
                    <li>
                        <b>MEILLEURS PRIX GARANTIS -</b> Nous vous garantissons les meilleurs prix possibles sur le marché !
                    </li>
                </ul>

            </div>
        </div>
    </div>
  </div>

  <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Produits tendance</h4>
                <div class="underline mb-4"></div>
            </div>

            @if ($trendingProducts)
            <div class="col md-12">
                <div class="owl-carousel owl-theme four-carousel">
                    @foreach ($trendingProducts as $product)
                        <div class="item">
                            <div class="product-card">
                                <div class="product-card-img">

                                    <label class="stock bg-danger">Nouveau</label>

                                    @if ($product->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                                    </a>
                                    @endif

                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $product->brand }}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">{{ $product->selling_price }} Dhs</span>
                                        <span class="original-price">{{ $product->original_price }} Dhs</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Products Available</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
  </div>

  <div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Nouveautés
                    <a href="{{ url('new-arrivals') }}" class="btn btn-primary float-end">Voir plus</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            @if ($newArrivalsProducts)
            <div class="col md-12">
                <div class="owl-carousel owl-theme four-carousel">
                    @foreach ($newArrivalsProducts as $product)
                        <div class="item">
                            <div class="product-card">
                                <div class="product-card-img">

                                    <label class="stock bg-danger">Nouveau</label>

                                    @if ($product->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                                    </a>
                                    @endif

                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $product->brand }}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">{{ $product->selling_price }} Dhs</span>
                                        <span class="original-price">{{ $product->original_price }} Dhs</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No New Arrivals Available</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
  </div>

  <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Produits vedettes
                    <a href="{{ url('featured-products') }}" class="btn btn-primary float-end">Voir plus</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            @if ($featuredProducts)
            <div class="col md-12">
                <div class="owl-carousel owl-theme four-carousel">
                    @foreach ($featuredProducts as $product)
                        <div class="item">
                            <div class="product-card">
                                <div class="product-card-img">

                                    <label class="stock bg-danger">Nouveau</label>

                                    @if ($product->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                                    </a>
                                    @endif

                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $product->brand }}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">{{ $product->selling_price }} Dhs</span>
                                        <span class="original-price">{{ $product->original_price }} Dhs</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Featured Products Available</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
  </div>

@endsection

@section('script')

<script>
    $('.four-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>

@endsection
