@extends('layout')
@section('title_page') Админ редактор продуктов @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            @isset($product)
            <h3 class="text-center"> Редактировать {{$product->name}}</h3>
            @else
            <h3 class="text-center"> Добавить продукт</h3>
            @endisset
        </div>
        <div class="card-body">


            <form method="POST" enctype="multipart/form-data" @isset($product)
                action="{{route('products.update',$product)}}" @else action="{{route('products.store')}}" @endisset>

                <div>
                    @isset($product)
                    @method('PUT')
                    @endisset


                    @isset($product)
                    <label for="image"> <b>Изображение: </label>
                    <img style="height:50px" src="{{Storage::url($product->image)}}" alt="ProductImage"></br>
                    @endisset

                    <label for="name"> <b>Наименование: </label>
                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror 
                    <input class="form-control" value="{{ old('name',isset($product)? $product->name : null)}}"
                        style="margin:2px;" type="text" name="name" id="name" required />

                    <div>
                    <label for="code">Код продукта: </label>
                        @error('code')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror                  
                        <input class="form-control" value="{{ old('code',isset($product)? $product->code : null)}}"
                            style="margin:2px;" type="text" name="code" id="code" />
                    </div>

                    <label for="category_id">Категория: </label>
                    @isset($product)
                    <select class="form-control" style="margin:2px;" id="category_id" name="category_id" required focus>
                        <option value="{{$category_id['id']}}" disabled selected>{{$category_id->name}}</option>
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                    @else
                    <select class="form-control" style="margin:2px;" id="category_id" name="category_id" required focus>
                        <option value="" disabled selected>Выберите категорию</option>
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                    @endisset


                    <label for="description">Описание: </label>                  
                    <textarea class="form-control" style="margin:2px;" name="description"
                        id="description"> {{ old('description',isset($product)? $product->description : null)}}  </textarea>

                    <label for="brand">Бренд: </label>
                    <input class="form-control" value=" {{ old('brand',isset($product)? $product->brand : null)}}"
                        style="margin:2px;" type="text" name="brand" id="brand" />

                    <label for="youtubeCode">Youtube Code: </label>


                    <input class="form-control"  value=" {{ old('youtubeCode',isset($product)? $product->youtubeCode : null)}}"
                        style="margin:2px;" type="text" name="youtubeCode" id="youtubeCode" />
                        
                        <label for="inshop_count">Колличество товара в наличии: </label>
                        @error('inshop_count')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror                
                    <input class="form-control" value="{{ old('inshop_count',isset($product)? $product->inshop_count : 0)}}"
                        style="margin:2px;" type="text" name="inshop_count" id="inshop_count" />

                    <label for="price">Цена: </label>
                    @error('price')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror  
                    <input class="form-control" value=" {{ old('price',isset($product)? $product->price : 0)}}"
                        style="margin:2px;" type="text" name="price" id="price" />

                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label for="image" style="margin-right: 5px;">Загрузить картинку: </label>
                        <input type="file" size="300" style="width:370px; border:solid 1px transparent;" name="image"
                            class="form-control">
                    </div>
                </div>

                @csrf
                <button class="btn btn-success col-sm-12 col-md-3 col-lg-3" style="margin-top:5px;">Подтвердить</button>
            </form>
        </div>
    </div>
</div>


@endsection