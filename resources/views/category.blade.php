@extends('layout')

@section('title_page') {{$category->name??''}} @endsection
@section('content')
<div class="container">
<div class="card" style="margin-top:5px;">
    <div class="card-header"><h2 class="text-center">{{$category->name??''}} </h2></div>
    <div class="card-body">

 

    <div class=" col-md-12 col-lg-12 col-sm-12" >
        @foreach($products as $product)
        <div class=" col-md-3 col-lg-3 col-sm-1 productDiv" >
        <div class="inProductsText">
        <a href="{{$category->code}}/{{$product->code}}">{{$product->name }}</a>
</div>
        <div class="productInDivImage" style="">
            <img class="productInDivImage" src="{{Storage::url($product->image)}}" style="height: 100%;">
        </div>
        <p class="text-dark">Цена:{{$product->price }} грн.</p>
        <form action="{{route('basket-add',$product->id)}}" method="POST" >
        <button class=' btn btn-success' type="submit" style="margin-right:10px;"> В корзину</button>       
        <a class=' btn btn-primary'   href="{{route('product',[$product->category->code,$product->code])}}">Подробнее</a>
        @csrf
        </form>
       
        </div>
        @endforeach
    </div>
    </div>
    </div>
    </div>
    <div class="d-flex justify-content-center">
    {{$products->links()}}
</div>
</div>
@endsection