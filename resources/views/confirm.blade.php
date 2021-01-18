@extends('layout')
@section('title_page') Подтверждение заказа @endsection
@section('content')


</form>


<div class="card">
    <div class="card-header" style="margin-top:5px;">
        <h2 class="text-center">Подтверждение </h2>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 ">
                    <h3 class="text-center">Данные пользователя </h3>
                    <form method="POST" action="{{route('finish-order')}}">
                        <input type="text" id="userName" name="userName"
                            placeholder="Введите Ф.И.О.(фамилию имя отчество)" class="form-control"
                            style="margin-top: 10px;">
                        <input type="text" id="userPhone" name="userPhone" placeholder="Введите телефон"
                            class="form-control" style="margin-top: 10px;">
                        <textarea class="form-control" id="userQuestion" name="userQuestion"
                            placeholder="Оставить комментарий" style="margin-top: 10px;"></textarea>
                        <select class="form-control"  style="margin-top: 10px;" id="selectAddres" name="selectAddres" required focus>
                            <option value="" disabled selected>Выберите отделение</option>
                            @foreach($branches as $novapochta)
                            <option value="{{$novapochta['Description']}}">{{$novapochta['Description']}}</option>
                            @endforeach
                        </select>
                        <button type="submit"
                            style="width:200px; height: 35px; margin:25px auto; display:block; border-radius: 10px; "
                            class="btn-success">Заказ подтверждаю</button>
                   
                        @csrf
                    </form>

                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 bordered" style="border-radius: 20px/20px;">
                    <h3 class="text-center">Информация о заказе </h3>
                    <h4>Заказ ID:#{{$order->id}}</h4>

                    @foreach($order->products as $product)
                    <ul>
                    <img style="height:50px" src="{{Storage::url($product->image)}}" alt="ProductImage">
                        <li>{{$product->name}} Цена: {{$product->price}} грн X {{$product->pivot->count}} ед. </li>
                    </ul>
                    @endforeach
                    <h4 class="text-success" >Итого: {{$order->getAllOrderTotalPrice()}} грн.</h4>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection