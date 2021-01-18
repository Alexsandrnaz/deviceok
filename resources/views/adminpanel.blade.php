@extends('layout')

@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header ">
        <h2 class="text-center">Панель администратора </h2>
        </div>
        <div class="card-body"> 


   
        <a  href="{{route('advertising.index')}}" >  <h4>Реклама(Редактировать).</h4> </a>
        <hr>
        <a  href="{{route('products.index')}}" >  <h4>Товары(добавить, редактировать, удалить).</h4> </a>
        <hr>
        <a  href="{{route('partners.index')}}" >  <h4>Партнеры(добавить, редактировать).</h4> </a>
        <hr>
        <a  href="{{route('categories.index')}}" >  <h4>Категории(добавить, редактировать, удалить).</h4> </a>
        <hr>
        <a  href="{{route('userorders')}}" >  <h4> Заказы ожидающие обработки менеджером. </h4> </a>
        <hr>
      <a  href="{{'/admin/ordersDiclined'}}" >  <h4> Заказы <span style="color:red;">(Отмененые).</span></h4> </a>
      <hr>
      <a  href="{{'/admin/ordersAccepted'}}" >  <h4> Заказы <span style="color:green;">(Выполненые).</span></h4> </a>
      <hr>
      <a  href="{{'/admin/ordersInShop'}}" >  <h4> Заказы<span>(Товар находится в точке выдачи).</span></h4> </a>
      <hr>
      <a  href="{{'/admin/ordersInPending'}}" >  <h4> Заказы <span>(В стадии выполнения).</span></h4> </a>
         <hr>
      <a  href="{{'/admin/userordersall'}}" >  <h4> Заказы <span style="color:gray;">(Все оформленные).</span></h4> </a>
      <hr>
        </div>

        </div>
        </div>
</div>


@endsection