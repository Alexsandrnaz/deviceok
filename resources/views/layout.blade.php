<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/slider.js') }}"></script>
    <title>@yield('title_page')</title>

</head>


<div class="container-fluid">


<div class="container">

    <body class="bg-light">

        <div class="slide-container">
            <div class="slide">
                <div class="slide-content" style="padding:15px;" >
                    
            <form action="{{route('home')}}" method="POST">
             <h3>Фильтры</h3>
             <label for="min_price">Цена от:</label>
             <input type="text" value="{{request()->min_price}}" name="min_price"  style="width:80%;" placeholder="Мин цена">

             <label for="max_price">Цена до:</label>
             <input type="text" value="{{request()->max_price}}" name="max_price" style="width:80%;" placeholder="Макс цена">
           <hr>



       
            <h4>Бренды: </h4>
            @foreach($brands as $brand)

            <input type="checkbox" @if(request()->has($brand->brand)) checked @endif name="{{$brand->brand}}"  value="{{$brand->brand}}">{{$brand->brand}}<br>

            @endforeach                  
            <button class="btn  btn-success  " style="margin-top:15px; " type="submit" name="searchBtnFilters"
            id="searchBtnFilters">Поиск</button>
            <a  href="{{route('index')}}"class="btn  btn-danger  " style="margin-top:15px; " type="submit" name="resetBtn"
            id="resetBtn">Сброс</a> 
            @csrf
            
                </div>
                


                <div class="slide-header" style="width: .7em; width: 1ch; text-align: center; font: Consolas, Monaco, monospace; word-wrap: break-word;">Фильтры</div>
            </div>
        </div>



        </div>


</div>
<div class="row hdiv ">
    <div class=" col-sm-12 col-md-12 col-lg-12 ">
        <a class=" btn col-sm-12 col-md-12 col-lg-12" href="{{route('index')}}">
            <img alt="logo" class="btn" src="/images/deviceok_logo.png">
        </a>
    </div>
    <nav class="navbar  navbar-expand-sm navbar-dark  col-md-12 col-sm-12 col-lg-12  ">
        <button class="navbar-toggler  col-sm-12" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class=" navbar-toggler-icon">
            </span>
        </button>

        <div class="row  col-md-12 col-lg-12  collapse navbar-collapse  " id="collapsibleNavbar"
            style="margin-right:25px;">
            <ul class="navbar-nav centered_navBar my_margin_for_div col-sm-12  col-md-12 col-lg-12  ">
                </li>
                <li class="nav-item liItemText">
                    <div class="dropdown">
                        <a href="{{route('categories')}}" class="dropbtn text-white"
                            style="margin-right:17px;">Категории</a>
                        <div class="dropdown-content">
                            @foreach($categories as $category)

                            <a href="{{route('category',$category->code)}}">
                                <img style="height:30px; width:30px;" src="{{Storage::url($category->image)}}"
                                    alt="CategoryImage">
                                <p style="margin-left:40px; " class="aItem">{{$category->name}}
                                    ({{$category->products->count()}})</p>
                                <p style="margin-left:40px; " class="alittle">{{$category->description}}</p>
                            </a>
                            <hr style=" border-top: 1px solid white;">

                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item liItemText">
                    <a class="p-2 text-white" href="{{route('review')}}">Отзывы</a>
                </li>
                <li class="nav-item liItemText">
                    <a class="p-2 text-white " href="{{route('about')}}">О нас</a>
                </li>
                <li class="nav-item liItemText">
                    <a class="p-2 text-white" href="#">Поддержка</a>
                </li>
                <li class="nav-item liItemText">
                    <a class="p-2 text-white" href="{{route('basket')}}">Корзина </a>
                </li>
                @guest
                <a href="{{ route('login') }}" class="btn   btn-success " style="margin-bottom:5px; margin-left:20px;"
                    type="submit" name="loginBtn" id="loginBtn">Вход</a>
                <a href="{{ route('register') }}" class="btn   btn-primary" style="margin-bottom:5px; margin-left:20px;"
                    type="submit" name="regBtn" id="regBtn">Регистрация</a>
                @endguest
                <li class="nav-item liItemText">
                    <div class="dropdown">
                        @if(auth()->user())
                        <h4 class="dropbtn text-warning">
                            <p class="text-success">Welcome: <span class="text-warning">{{auth()->user()->name}}</span>
                            </p>
                        </h4>
                        @endif
                        <div class="dropdown-content">
                            <div class="card-body">
                                @if(auth()->user())
                                <a class="LCitem" href="{{route('personalpage')}}">Личный кабинет</a><br>
                                @if(auth()->user()->email=='admin@deviceok.ua')
                                <a class="LCitem" href="{{route('adminpanel')}}">Админ панель</a><br>
                                @endif
                                <a href="{{ route('logout') }}" class="LCitem">Выход</a>
                                @endif
                            </div>
                        </div>
                </li>

        </div>
    </nav>
 
        <input class="" type="search" name="searchStr" value="{{request()->searchStr}}" id="searchStr" placeholder="Поиск по сайту"
            style="margin-left:25%; height:40px; width:50%; " aria-label="Search">
        <button class="btn  btn-success  " style="margin-bottom:5px; " type="submit" name="searchBtn"
            id="searchBtn" >Поиск</button>
        @csrf
    </form>


</div>

@yield('content')
</div>
</body>


</html>