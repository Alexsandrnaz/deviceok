@extends('layout')
@section('title_page') Админ редактор категорий @endsection
@section('content')
<div class="container">
    <div class="card" style="margin-top:5px;">
        <div class="card-header">
            @isset($partner)
            <h3 class="text-center"> Редактировать партнера {{$partner->name}}</h3>
            @else
            <h3 class="text-center">Добавить партнера</h3>
            @endisset
        </div>
        <div class="card-body">


            <form method="POST" enctype="multipart/form-data" @isset($partner)
                action="{{route('partners.update',$partner)}}" @else action="{{route('partners.store')}}"
                @endisset>

                <div>
                    @isset($partner)
                    @method('PUT')
                    <label for="image_img">Изображение: </label>
                    <img style="height:50px" name="image_img" src="{{Storage::url($partner->image)}}"
                        alt="partnerImage"></br>
                    @endisset
                    
                    <div>
                    <label for="name">Название: </label>
                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>

                        @enderror
             
                    <input class="form-control" value="{{old('name', isset($partner->brand)? $partner->brand: null)}}"
                        style="margin:5px;" type="text" name="brand" id="brand" />
                    </div>
                    <label for="description">Описание: </label>
                    <textarea class="form-control" style="margin:5px;" name="description"
                        id="description">  {{old('description', isset($partner)? $partner->description : null)}}</textarea>

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