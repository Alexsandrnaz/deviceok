@extends('layout')
@section('title_page') Корзина @endsection

@section('content')


<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            <h2 class="text-center">Товары в корзине </h2>
            @if(session()->has('success'))
            <p class="allert alert-success text-center"> {{session()->get('success')}}</p>
            @elseif(session()->has('decrease'))
            <p class="allert alert-danger text-center"> {{session()->get('decrease')}}</p>
            @endif
        </div>
        <div class="card-body">
        @if(!is_null($order) && $order->getTotalCount()!=0)
            <table table table-striped>
                <thead>
                    <tr>                       
                        <th class="text-center" style="border:solid 1px black;">Наименование:</th>
                        <th class="text-center" style="border:solid 1px black;">Код товара:</th>
                        <th class="text-center" style="border:solid 1px black;">Кол-тво:</th>
                        <th class="text-center" style="border:solid 1px black;">+/-</th>
                        <th class="text-center" style="border:solid 1px black;">Цена за ед:</th>
                        <th class="text-center" style="border:solid 1px black;">Итого:</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($order->products as $product)
                    <tr class="bordered">
                        <td class="bordered " style="width:60%;">
                            <img style="height:50px" src="{{Storage::url($product->image)}}" alt="ProductImage">
                            <a
                                href="{{route('product',[$product->category->code,$product->code])}}">{{$product->name}}</a>
                        </td>
                        <td class="text-center bordered">{{$product->code}} </td>
                        <td class="text-center bordered"><span>{{$product->pivot->count}} ед.</span></td>
                        <td class="text-center bordered">
                            <form action="{{route('basket-add',$product)}}" method="POST">
                                <button href="" style="width:100px; margin:5px; " class=" btn btn-success">
                                    Добавить</button>
                                @csrf
                            </form>
                            <form action="{{route('basket-remove',$product)}}" method="POST">
                                <button href="" style="width:100px;margin:5px;" class=" btn btn-danger">Убрать</button>
                                @csrf
                            </form>
                        </td>
        </div>

        <td class="text-center bordered">{{$product->price}} грн.</td>
        <td class="text-center bordered">{{$product->getOrderTotalPrice()}} грн.</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2"></td>
            <td class="text-center bordered" colspan="1">{{$order->getTotalCount()}} ед. </td>
            <td class="text-center bordered" colspan="2">Всего к оплате: </td>
            <td class="text-center bordered">{{$order->getAllOrderTotalPrice()}} грн.</td>
        </tr>
        </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <form action="{{route('confirm-order')}}" method="GET">
                <button type="accept" href="" class="btn btn-success">Подтвердить заказ</button>
            </form>

            @else
            <a class="text-center" style="font-size:20px;" href="{{route('index')}}">В корзине нет товаров, добавьте хотя бы один чтобы
                оформить заказ (Нажмите чтобы продолжить.) </a>
            @endif
        </div>
    </div>
</div>
</div>
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection