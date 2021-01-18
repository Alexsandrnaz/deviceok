@extends('layout')
@section('title_page') Админ редактор партнеров @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            <h3 class="text-center">Редактор партнеров</h3>      
            <a  type="button"name="partnerCreateBtn" class="btn btn-success"  href="{{route('partners.create')}}" style="margin:2px;">Добавить партнера</a>         
        </div>
        <div class="card-body">
            <table class="text-center" style="width:99%">
                <th>ID</th>
                <th>Изображение</th>
                <th>Бренд</th>         
                <th>Редактировать партнеров</th>
                @foreach($partners as $partner)
                <tr class="bordered">
                    <td class="bordered">{{$partner->id}}</td>
                    <td><img style="height:20px" src="{{Storage::url($partner->image)}}" alt="partnerImage"></td>
                    <td>{{$partner->brand}}</td>                             
                    <td>
                        <form action="{{route('partners.destroy',$partner)}}" method="POST">
                      

                            <a href="{{route('partners.edit',$partner->id)}}" class="btn btn-warning" style="margin:2px;" type="button">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" style="margin:2px;" type="submit" value="Удалить"/>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection