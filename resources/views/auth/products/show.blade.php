@extends('layout')
@section('content')


@section('title_page'){{$product['name']}} @endsection
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            <h1 class="text-center">{{$product['name']}} </h1>
        </div>
        <div class="card-body">
            <div class="col   no-gutters my_div_border size_div  col-md-6 col-lg-8 col-sm-12">

                <div class="row ">
                    <div class=" col-sm-12 col-xs-12 col-md-12 col-lg-6">
                        <p class="my_a"> Фото:
                        </p>
                        <img alt="new_img" class="inspect_img_size photo_divices_border" src="{{Storage::url($product['image'])}}">
                        <br>
                        <p class="my_a"> Видео:
                        </p>
                        @if($product['youtubeCode'])
                        <iframe height="300px" width="99%" frameBorder="0"
                            src="https://www.youtube.com/embed/{{$product['youtubeCode']}}?autoplay=0">
                        </iframe>
                        @else
                        <p>No current video for this product</p>
                        @endif
                    </div>
                    <div class=" col-sm-12  col-xs-12 col-md-12 col-lg-6">


                        <form action="{{route('products.destroy',$product)}}" method="POST">
                            <a href="{{route('products.edit',$product['id'])}}" class="btn btn-warning"
                                style="margin:2px;" type="button">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" style="margin:2px;" type="submit" value="Удалить" />
                        </form>
                        <p class="my_a"> ID товара: <span class="text-dark">{{$product['id']}} </span></p>
                        <p class="my_a"> Код товара: <span class="text-dark">{{$product['code']}} </span></p>
                        <p class="my_a"> В наличии : <span class="text-dark">{{$product['inshop_count']}} </span></p>
                        <p class="my_a"> Код категории : <span class="text-dark">{{$product['category_id']}} </span></p>
                        <p class="my_a">Бренд : <span class="text-dark">{{$product['brand']}} </span></p>
                        <p class="my_a">Youtube code : <span class="text-dark">{{$product['youtubeCode']}} </span></p>
                        <p class="my_a"> Цена: <span class="text-dark">{{$product['price']}} грн. </span></p>
                        <form action="{{route('basket-add',$product['id'])}}" method="POST">
                            <button type="submit" class='btn btn-success'> В корзину</button>
                            @csrf
                        </form>
                        <p class="my_a"> Описание: </p>
                        <p> {{$product['description']}}</p>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection