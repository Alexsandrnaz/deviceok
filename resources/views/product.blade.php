@extends('layout')
@section('end_main_header')
@section('title_page') ProductName @endsection

<div class="container">
  
         <div class=" col-md-12 col-lg-12 col-sm-12 productDiv" >
             <h1></h1>
            <a  href="#">Процессор intel core i5 </a>
            <div class="productInDivImage" style="">
                <img  class ="productInDivImage" src="/images/inteli5.jpg" style="height: 100%;">
            </div>
            <p class="text-dark">Цена: 6250 грн </p>
            <button class='btn-success'> В корзину</button>
            <button class='btn-primary'>Описание</button>
        </div>
       
       
</div>
@endsection