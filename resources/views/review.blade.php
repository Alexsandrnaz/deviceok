@extends('layout')
@section('title_page') Оставить отзыв @endsection
@section('end_main_header')
<h1 style="text-align: center; " class="text-dark"> Оставить отзыв</h1>
<div class="container">
<form method="POST" action="/review/check">
<input type="email" id="email" name="email" placeholder="Введите email" class="form-control" style="margin: 10px;"> 
<input type="text" id="userName" name="userName" placeholder="Введите имя" class="form-control" style="margin: 10px;"> 
<textarea class="form-control"  placeholder="Введите текст отзыва" style="margin: 10px;"></textarea>
<button type="submit" style="width:200px; height: 35px; margin:25px auto; display:block; border-radius: 10px; " class="btn-success">Отправить</button>
</form>
</div>
@endsection