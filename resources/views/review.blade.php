@extends('layout')
@section('title_page')Отзывы DeviceOK @endsection
@section('review') Оставить отзыв @endsection
@section('content')


<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header text-center">
            @guest
            <a href="{{route('register')}}" class="text-center">
                <h2>Зарегистрируйтесь чтобы оставить отзыв</h2>
            </a>
            @endguest
            @auth
            <h2 class="text-center">Оставить отзыв </h2>
        </div>

        <form method="POST" action="{{route('reviewcomment')}}">

            @if(auth()->user()->commentState==0)
            <h4 class="text-center">Здравствуйте: {{auth()->user()->name}} оставте свой отзыв о сайте :)</h4>
            @elseif(auth()->user()->commentState==1)
            <h4 class="text-center">Здравствуйте: {{auth()->user()->name}} вы уже оставляли отзыв о сайте но можете его изменить если ваше
                мнение помнялось :)</h4>
            @endif
            <textarea type="text" id="comment" name="comment" class="form-control" placeholder="Введите текст отзыва"
                style="pagging:20px;"></textarea>
            <div class="rating-area ">
                <input type="radio" id="star-10" name="rating" value="10">
                <label for="star-10" title="Оценка «10»"></label>
                <input type="radio" id="star-9" name="rating" value="9">
                <label for="star-9" title="Оценка «9»"></label>
                <input type="radio" id="star-8" name="rating" value="8">
                <label for="star-8" title="Оценка «8»"></label>
                <input type="radio" id="star-7" name="rating" value="7">
                <label for="star-7" title="Оценка «7»"></label>
                <input type="radio" id="star-6" name="rating" value="6">
                <label for="star-6" title="Оценка «6»"></label>
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="Оценка «5»"></label>
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="Оценка «4»"></label>
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="Оценка «3»"></label>
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="Оценка «2»"></label>
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="Оценка «1»"></label>
            </div>
            <button type="submit"
                style="width:200px; height: 35px; margin:25px auto; display:block; border-radius: 10px; "
                class="btn-success text-center">Отправить</button>
            @csrf
        </form>

        @endauth
    </div>

    <div class="card" style="margin-top:5px;">

        <div class="card-header text-center">
            <h2 class="text-center">Отзывы сайта DeviceOK </h2>
        </div>

        <div class="card-body ">
            @foreach($reviews as $review)

            <ul>
                <li><span style="font-size:20px; color:green;">{{$review->userName}}:</span> <span
                        style="font-size:15px; color:green;">{{$review->userComment}} </span>[Оценил сайт на :
                    {{$review->userRate}} <span style="font-size:25px; color:gold;">★</span>]
                    {{$review->created_at}}</li>
                <hr>
            </ul>

            @endforeach
        </div>

    </div>

</div>
<div class="d-flex justify-content-center">
    {{$reviews->links()}}
</div>

@endsection