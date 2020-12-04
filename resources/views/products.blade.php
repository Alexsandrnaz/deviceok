@extends('layout')
@section('end_main_header')
@section('title_page') ProductName @endsection

<div class="container">
    <div class="row col-md-12 col-lg-12 col-sm-12" style="display:inline-flex;">
      
         <div class=" col-md-3 col-lg-3 col-sm-1 productDiv" >
            <a  href="/i5">Процессор intel core i5 </a>
            <div class="productInDivImage" style="">
                <img  class ="productInDivImage" src="/images/inteli5.jpg" style="height: 100%;">
            </div>
            <p class="text-dark">Цена: 6250 грн </p>
            <button class='btn-success'> В корзину</button>
            <button class='btn-primary'>Описание</button>
        </div>
       
        <div class=" col-md-3 col-lg-3 col-sm-1 productDiv" >
            <a  href="/hddBaracuda">Винчестер Baracuda</a>
            <div class="productInDivImage" style="">
                <img  class ="productInDivImage" src="/images/hddbaracuda.jpg" style="height: 100%;">
            </div>
            <p class="text-dark">Цена: 850 грн </p>
            <button class='btn-success'> В корзину</button>
            <button class='btn-primary'>Описание</button>
        </div>

        <div class=" col-md-3 col-lg-3 col-sm-1  productDiv">           
            <a href="#">Оперативная память Knigstone </a>
            <div class="productInDivImage" style="">
                <img  class ="productInDivImage" src="/images/kingstone.jpg" style="height: 100%;">
            </div>
            <p class="text-dark">Цена: 2250 грн </p>
            <button class='btn-success'> В корзину</button>
            <button class='btn-primary'>Описание</button>
        </div>
     
    </div>
</div>
@endsection