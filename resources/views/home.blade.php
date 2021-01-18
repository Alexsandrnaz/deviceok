@extends('layout')
@section('title_page') Главная страница @endsection
@section('content')

<script>
$(document).ready(function(){
    var slideIndex = 1;
showSlides(slideIndex);
    })
</script>
<div class="container">
  
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
        

            <!-- Slideshow container -->
            <div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="{{Storage::url($advertising[0]->image)}}" style="width:100%;   height:200px;">
  <div class="text" >{{$advertising[0]->description}}</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="{{Storage::url($advertising[1]->image)}}" style="width:100%; height:200px;">
  <div class="text">{{$advertising[1]->description}}</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="{{Storage::url($advertising[2]->image)}}" style="width:100%; height:200px;">
  <div class="text">{{$advertising[2]->description}}</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>
</div>
            @if(session()->has('notHaveRight'))
            <p class="allert alert-danger text-center "> {{session()->get('notHaveRight')}}</p>
            @endif
     
        @if(session()->has('orderAccept'))
        <p class="allert alert-success text-center"> {{session()->get('orderAccept')}}</p>
        @endif

        @if(session()->has('noFoundResult'))
            <p class="allert alert-danger text-center"> {{session()->get('noFoundResult')}}</p>
            @endif
            @if(session()->has('FoundResult'))
            <p class="allert alert-success text-center"> {{session()->get('FoundResult')}}</p>
            @endif
        <div class="card-body">
            <div class=" col-md-12 col-lg-12 col-sm-12 ">

                @foreach($products as $product)

                <div class=" col-md-3 col-lg-3  col-sm-1 productDiv  bordered" >
                    <div class="inProductsText">
                    <a href="{{route('product',[$product->category->code,$product->code])}}">{{$product->name }}</a>
                    </div>
                    <div class="productInDivImage" style="">
                        <img class="productInDivImage" src="{{Storage::url($product->image)}}" style="height: 100%;">
                    </div>
                    <p> Тип: {{$product->category->name}}</p>
                    <p class="text-dark">Цена:{{$product->price }} грн. </p>
                    <form action="{{route('basket-add',$product->id)}}" method="POST">
                        <button class=' btn btn-success' style="margin-right:10px;" href="{{route('basket')}}"> В
                            корзину</button>
                        <a class=' btn btn-primary'
                            href="{{route('product',[$product->category->code,$product->code])}}">Подробнее</a>
                        @csrf
                    </form>
        
                    </div>
                @endforeach
           

            </div>
        </div>
    </div>
</div>
</div>
@if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
<div class="d-flex justify-content-center">
    {{$products->links()}}
</div>
@endif
</div>
@endsection
