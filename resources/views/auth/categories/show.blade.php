@extends('layout')
@section('title_page') Админ просмотр категорий @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            <h3 class="text-center">Категория: {{$category->name}}</h3>


        </div>
        <div class="card-body">

            <table class="text-center">
                <th  class="bordered " style=" padding:10px; margin:10px;">ID</th>
                <th class="bordered" style="padding:10px margin:10px;">Код категории</th>
                 <th class="bordered" style="padding:10px; margin:10px;">Изображение</th>
                 <th class="bordered" style="padding:10px; margin:10px;">Имя категории</th>            
                <th class="bordered" style="padding:10px; margin:10px; width:75%;">Описание</th>
                <tr style="height:100px;">
                    <td class="bordered" style="padding:10px; margin:10px;">
                        {{$category->id}}
                    </td>
                    <td class="bordered" style="padding:10px; margin:10px;"> 
                    {{$category->code}}
                    </td>
                    <td class="bordered"  style="width:100px;">
                    <img style="height:100px; padding:5px;" src="{{Storage::url($category->image)}}">
               
                    </td>
                    <td class="bordered" style="padding:10px; margin:10px;">
                    {{$category->name}}
                    </td>
                    <td class="bordered" style="padding:10px; margin:10px;">
                    {{$category->description}}
                    </td>
                </tr>

            </table>
            <hr>                            
                            <form action="{{route('categories.destroy',$category)}}" method="POST">
                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning" style="margin:2px;" type="button">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" style="margin:2px;" type="submit" value="Удалить" />
                        </form>

        </div>
    </div>
</div>


@endsection