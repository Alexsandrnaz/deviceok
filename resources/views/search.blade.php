@extends('layout')
@section('title_page')Результаты поиска @endsection
@section('content')

<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header text-center">
         <h3>Результаты поиска<h3>
        </div>
        <div class="card-body">

@if(!is_null($order))

<p><span style="font-size:18px; color:green">Номер заказа: </span><span style="font-size:18px;">#{{$order->id}}</span></p>
<p><span style="font-size:18px; color:green">Имя: </span><span style="font-size:18px;"> {{$order->userName}}</span>
<span style="font-size:18px; color:green">Телефон: </span><span style="font-size:18px;"> {{$order->userPhone}}</span>
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
<a class="btn btn-warning" href="{{route('userorders')}}">Вернуться к заказам пользователей</a><br>
<hr>
<div class="d-flex">
</form>
 <form action="{{route('userordersacceted',$order->id)}}" method="POST">
<button class="btn btn-warning" style="margin-left:5px;" type="success" name="btnaccept" id="btnaccept">Отметить как обработаный</button>
@csrf
 </form>  
<form action="{{route('userordersconfirm',$order->id)}}" method="POST">
<button class="btn btn-success" style="margin-left:5px;" type="success" name="btnaccept" id="btnaccept">Отметить как завершенный</button>
@csrf
 </form>
 <form action="{{route('userordersdecline',$order->id)}}" method="POST">
 <button class="btn btn-danger" style="margin-left:5px;"  type="success" name="btndicline" id="btndicline">Пользователь отменил заказ</button>
 @csrf
 </form>
 <form action="{{route('userordersinshop',$order->id)}}" method="POST">
<button class="btn" style="background-color:gold;margin-left:5px;" type="success" name="btnshop" id="btnshop">Товар доставлен в пункт выдачи.</button>
@csrf
@else
<h3 class="text-danger">Заказ с данным ID не существует.<h3>

                                        <a class="btn btn-warning" href="{{route('userorders')}}">Вернуться к заказам пользователей</a><br>
@endif


 </div>        
        </div>
    </div>
</div>


@endsection