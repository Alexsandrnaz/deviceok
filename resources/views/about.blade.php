<?php
namespace App\Classes;

$item = new Product();
$item->name ="test";
$item->price ="122000";

?>


@extends('layout')
@section('end_main_header')
@section('title_page') О сайте @endsection
<div class="container ">
    <h1>Страница про нас</h1>
<p >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem voluptas id in quasi nihil, enim possimus atque. Deserunt a recusandae sequi! Rem molestias consectetur a mollitia qui facilis, architecto rerum.</p>
</div>


<div class="container ">

    <h1>MyItem</h1>
<p>{{$item->show()}}</p>
</div>
@endsection


