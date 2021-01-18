@extends('layout')
@section('title_page') Админ редактор продуктов @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            <h3 class="text-center">Редактор продуктов</h3>      
            <a  type="button"name="productCreateBtn" class="btn btn-success"  href="{{route('products.create')}}" style="margin:2px;">Добавить продукт</a>         
        </div>
        <div class="card-body">
            <table class="text-center" style="width:99%">
                <th>ID</th>
                <th>Изображение</th>
                <th style="width:40%">Название</th>
                <th>Код</th>         
                <th>Редактировать продукты</th>
                @foreach($products as $product)
                <tr class="bordered">
                    <td class="bordered">{{$product->id}}</td>
                    <td><img style="height:20px" src="{{Storage::url($product->image)}}" alt="ProductImage"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->code}}</td>
         
                    <td>
                        <form action="{{route('products.destroy',$product)}}" method="POST">
                      
                            <a href="{{route('products.show',$product->id)}}" class="btn btn-primary " style="margin2px;" type="button">Просмотр</a>
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning" style="margin:2px;" type="button">Редактировать</a>
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