@extends('layout')
@section('title_page')Личный кабинет @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header text-center">
         <h3>Личный кабинет<h3>
        </div>
        <div class="card-body">

<ul>
@foreach($userOrders as $order)
<li>

<p><span style="font-size:18px; color:green">Номер заказа: </span><span style="font-size:18px;">#{{$order->id}}</span></p>
<p><span style="font-size:18px; color:green"> Дата: </span><span style="font-size:18px;">{{$order->created_at}}</span></p>
<p><span style="font-size:18px; color:green"> Адрес доставки: </span><span style="font-size:18px;">{{$order->userAddress}}</span></p> 
<p><span style="font-size:18px; color:green">   Статус доставки:  </span>   
@if(is_null($order->userDeliveryStatus))
<span style="font-size:18px; color:gray">В обработке(ожидайте наши менеджеры свяжутся с вами).
@elseif($order->userDeliveryStatus==1)
<span  style="font-size:18px; color:#8B4513">Обработан.
@elseif($order->userDeliveryStatus==2)
<span style="font-size:18px; color:green">Завершен.
@elseif($order->userDeliveryStatus==3)
<span style="font-size:18px; color:Red">Отменен.
@elseif($order->userDeliveryStatus==5)
<span  style="font-size:18px; color:#ff9900">Ожидает в пункте выдачи.
@endif
</span></p>
<a class="btn btn-primary" type="button" href="{{route('inspect',$order->id)}}" >Подробнее</a>
<hr>
</li>

@endforeach
</ul>

        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{$userOrders->links()}}
</div>
@endsection