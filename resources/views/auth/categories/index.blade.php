@extends('layout')
@section('title_page') Админ редактор категорий @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            <h3 class="text-center">Редактор категорий</h3>      
            <a  type="button"name="categoryCreateBtn" class="btn btn-success"  href="{{route('categories.create')}}" style="margin:2px;">Создать категорию</a>         
        </div>
        <div class="card-body">
            <table class="text-center" style="width:99%">
                <th>ID</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Код</th>
                <th>Кол-тво товаров в категории:</th>
                <th>Управлять категорией</th>
                @foreach($categories as $category)
                <tr class="bordered">
                    <td class="bordered">{{$category->id}}</td>
                    <td><img style="height:20px" src="{{Storage::url($category->image)}}" alt="CategoryImage"></td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->code}}</td>
                    <td>{{$category->products->count()}}</td>            
                    <td>
                        <form action="{{route('categories.destroy',$category)}}" method="POST">
                      
                            <a href="{{route('categories.show',$category->id)}}" class="btn btn-primary " style="margin2px;" type="button">Просмотр</a>
                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning" style="margin:2px;" type="button">Редактировать</a>
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