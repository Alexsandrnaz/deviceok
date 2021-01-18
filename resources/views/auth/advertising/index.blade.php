@extends('layout')
@section('title_page') Админ редактор рекламы @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            <h3 class="text-center">Редактор рекламы</h3>
            <a type="button" name="advertisingCreateBtn" class="btn btn-success" href="{{route('advertising.create')}}"
                style="margin:2px;">Создать Рекламу</a>
        </div>
        <div class="card-body">
            <table class="text-center" style="width:99%">
                <th>ID</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Управлять рекламой</th>

                @foreach($advertisings as $advertising)
                
                <tr class="bordered">
                    <td class="bordered">{{$advertising->id}}</td>
                    <td ><img style=" max-width:500px;" src="{{Storage::url($advertising->image)}}" alt="AdvertisingImage"></td>
                    <td class="bordered">{{$advertising->name}}</td>
                    <td class="bordered">
                        <form action="{{route('advertising.destroy',$advertising)}}" method="POST">
                            <a href="{{route('advertising.edit',$advertising->id)}}" class="btn btn-warning"
                                style="margin:2px;" type="button">Редактировать</a> </br>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" style="margin:2px;" type="submit" value="Удалить" />
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection