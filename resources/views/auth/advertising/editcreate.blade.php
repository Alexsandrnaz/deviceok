@extends('layout')
@section('title_page') Админ редактор рекламы @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            @isset($category)
            <h3 class="text-center"> Редактировать  рекламн {{$advertising->name}}</h3>
            @else
            <h3 class="text-center"> Создать рекламу</h3>
            @endisset
        </div>
        <div class="card-body">


            <form method="POST" enctype="multipart/form-data" @isset($advertising)
                action="{{route('advertising.update',$advertising)}}" @else action="{{route('advertising.store')}}"
                @endisset>

                <div>
                    @isset($advertising)
                    @method('PUT')
                    <label for="image_img">Изображение: </label>
                    <img style="height:200px" name="image_img" src="{{Storage::url($advertising->image)}}"
                        alt="$advertisingImage"></br>
                    @endisset
                
                    <div>
                    <label for="name">Название: </label>   
                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>       
                        @enderror       
                    <input class="form-control" value="{{old('name', isset($advertising->name)? $advertising->name: null)}}"
                        style="margin:5px;" type="text" name="name" id="name" />
                    </div>
                  

                        <div>
                    <label for="name">Владелец рекламы: </label>   
                    @error('owner')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>   
                        @enderror        
                    <input class="form-control" value="{{old('owner', isset($advertising->owner)? $advertising->owner: null)}}"
                        style="margin:5px;" type="text" name="owner" id="owner" />
                    </div>

                    <label for="description">Текст рекламы: </label>
                    <textarea class="form-control" style="margin:5px;" name="description"
                        id="description">  {{old('description', isset($advertising)? $advertising->description : null)}}</textarea>

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