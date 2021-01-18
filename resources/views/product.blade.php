@extends('layout')
@section('content')

@foreach($product as $item)
@section('title_page'){{$item->name}} @endsection
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            <h1 class="text-center">{{$item->name}} </h1>
        </div>
        <div class="card-body">
            <div class="col   no-gutters my_div_border size_div  col-md-6 col-lg-8 col-sm-12">

                <div class="row ">
                    <div class=" col-sm-12 col-xs-12 col-md-12 col-lg-6">
                        <p class="my_a"> Фото:
                        </p>
                        <img alt="new_img" class="inspect_img_size photo_divices_border" src="{{Storage::url($item->image)}}">
                        <br>
                        <p class="my_a"> Видео:
                        </p>
                        @if($item->youtubeCode)
                        <iframe height="300px" width="99%" frameBorder="0"
                            src="https://www.youtube.com/embed/{{$item->youtubeCode}}?autoplay=0">
                        </iframe>
                        @else
                        <p>No current video for this product</p>
                        @endif
                    </div>
                    <div class=" col-sm-12  col-xs-12 col-md-12 col-lg-6">
                        <p class="my_font">
                        <p class="my_a"> Характеристики: </p>
                        <p class="my_a"> Описание: </p>
                        <p>
                            {{$item->description}}
                        </p>
        
                        <p class="text-dark">Цена: {{$item->price}} грн.</p>
                        <form action="{{route('basket-add',$item->id)}}" method="POST">
                            <button type="submit" class='btn btn-success'> В корзину</button>
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
@endsection