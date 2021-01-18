@extends('layout')
@section('title_page') Админ редактор категорий @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            @isset($category)
            <h3 class="text-center"> Редактировать категорию {{$category->name}}</h3>
            @else
            <h3 class="text-center"> Создать категорию</h3>
            @endisset
        </div>
        <div class="card-body">


            <form method="POST" enctype="multipart/form-data" @isset($category)
                action="{{route('categories.update',$category)}}" @else action="{{route('categories.store')}}"
                @endisset>

                <div>
                    @isset($category)
                    @method('PUT')
                    <label for="image_img">Изображение: </label>
                    <img style="height:50px" name="image_img" src="{{Storage::url($category->image)}}"
                        alt="CategoryImage"></br>
                    @endisset
                    <div>
                        <label for="code">Код категории: </label>
                        @error('code')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>

                        @enderror
                        <input class="form-control" value=" {{old('code', isset($category)? $category->code : null)}}"
                            style="margin:5px;" type="text" name="code" id="code" />
                    </div>
                    <div>
                    <label for="name">Название: </label>
                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>

                        @enderror
             
                    <input class="form-control" value="{{old('name', isset($category->name)? $category->name: null)}}"
                        style="margin:5px;" type="text" name="name" id="name" />
                    </div>
                    <label for="description">Описание: </label>
                    <textarea class="form-control" style="margin:5px;" name="description"
                        id="description">  {{old('description', isset($category)? $category->description : null)}}</textarea>

                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label for="image" style="margin-right: 5px;">Загрузить(Редактировать текущую) картинку:
                        </label>
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