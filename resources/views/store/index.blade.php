@extends('store.layout')

@section('categories')
    @include('store.categories_')
@stop

@section('content')

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @foreach($featuredProducts as $featured)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if (count($featured->images))
                                    <img src="" alt="" alt="" width="200"/>
                                @else
                                    <img src="images/no-img.jpg" alt="" width="200"/>
                                @endif
                                <h2>{{ $featured->price }}</h2>
                                <p>{{ $featured->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart">
                                    <i class="fa fa-crosshairs"></i>Mais detalhes
                                </a>

                                <a href="#" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>Adicionar no carrinho
                                </a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{ $featured->price }}</h2>
                                    <p>{{ $featured->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart">
                                        <i class="fa fa-crosshairs"></i>Mais detalhes
                                    </a>

                                    <a href="#" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>Adicionar no carrinho
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--features_items-->


        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            @foreach($recommendedProducts as $recommended)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">

                            @if (count($recommended->images))
                                <img src="" alt="" alt="" width="200"/>
                            @else
                                <img src="images/no-img.jpg" alt="" width="200"/>
                            @endif

                            <h2>{{ $recommended->price }}</h2>
                            <p>{{ $recommended->name }}</p>
                            <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{ $recommended->price }}</h2>
                                <p>{{ $recommended->name }}</p>
                                <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="http://commerce.dev:10088/cart/4/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--recommended-->
    </div>

@stop