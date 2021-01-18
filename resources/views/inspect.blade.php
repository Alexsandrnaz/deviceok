@extends('layout')

@section('content')
<div class="container">
<div class="card" style="margin-top:5px;">
    <div class="card-header">
        <h2 class="text-center">Заказ номер: #{{$order->id}}
            @if(is_null($order->userDeliveryStatus))
            <span style="font-size:18px; color:gray">В обработке(ожидайте наши менеджеры свяжутся с вами).
                @elseif($order->userDeliveryStatus==1)
                <span style="font-size:18px; color:#8B4513">Обработан.
                    @elseif($order->userDeliveryStatus==2)
                    <span style="font-size:18px; color:green">Завершен.
                        @elseif($order->userDeliveryStatus==3)
                        <span style="font-size:18px; color:Red">Отменен.
                            @elseif($order->userDeliveryStatus==5)
                            <span style="font-size:18px; color:#ff9900">Ожидает в пункте выдачи.
                                @endif
                            </span></p>
        </h2>
    </div>
    <div class="card-body">

        @foreach($order->products as $product)
        <div class='bordered '>
            <img style="height:50px; margin-top:10px;margin-left:10px;" src="{{Storage::url($product->image)}}"
                alt="ProductImage">
            <a href="{{route('product',[$product->category->code,$product->code])}}">{{$product->name}}</a>
            <p class="text-center"><span style="font-size:15px; color:green"> Код продукта: </span>{{$product->code}}
                <span style="font-size:15px; color:green"> Колличество: </span>{{$product->pivot->count}} ед.
                <span style="font-size:15px; color:green"> Стоимость: </span>{{$product->price}} грн.
            </p>
        </div>



        @endforeach

        <a class="btn btn-primary" style="margin-top:15px;" type="button" href="{{route('personalpage')}}">Вернуться в
            личный кабинет</a>
        @if(auth()->user()->email=='admin@deviceok.ua')
        <a class="btn btn-warning" style="margin-top:15px;" href="{{route('userorders')}}">Вернуться к заказам
            пользователей</a><br>
        @endif
    </div>
</div>
</div>
</div>
@endsection