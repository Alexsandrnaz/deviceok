@extends('layout')
@section('content')
@section('title_page') Категории @endsection

<div class="container">
<div class="card" style="margin-top:5px;">
    <div class="card-header" ><h2 class="text-center">Категории </h2></div>
    <div class="card-body">
    <ul>
     
        @foreach($categories as $category)
        <li style="list-style-type: none;">
        <img style="height:50px" src="{{Storage::url($category->image)}}" alt="ProductImage"><a href="{{route('category',$category->code)}}"> {{$category->name}} ({{$category->products->count()}}) </a> </br> <p>{{$category->description}}</p>
        </li>
        <hr>
        @endforeach
    </ul>
    </div>
    </div>
    </div>
</div>
@endsection