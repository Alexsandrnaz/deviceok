<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>@yield('title_page')</title>
</head>

<body class="bg-light">
    <div class="container-fluid">
    </div>
    <div class="row hdiv ">
        <div class=" col-sm-12 col-md-12 col-lg-12 ">
            <a class=" btn col-sm-12 col-md-12 col-lg-12" href="/index.php">
                <img alt="logo" src="images/deviceok_logo.png">
            </a>
        </div>
        <nav class="navbar  navbar-expand-sm navbar-dark  col-md-12 col-sm-12 col-lg-12  ">
            <button class="navbar-toggler  col-sm-12" type="button" data-toggle="collapse"
                data-target="#collapsibleNavbar">
                <span class=" navbar-toggler-icon">
                </span>
            </button>

            <div class="row  col-md-12 col-lg-12  collapse navbar-collapse  " id="collapsibleNavbar"
                style="margin-right:25px;">
                <ul class="navbar-nav centered_navBar my_margin_for_div col-sm-12  col-md-12 col-lg-12  ">

                    </li>
                    <li class="nav-item liItemText ">
                        <a class="p-2 text-white " href="/index.php">Главная</a>
                    </li>
                    <li class="nav-item liItemText">
                        <a class="p-2 text-white" href="/categories">Категории </a>
                    </li>
                  
                    <li class="nav-item liItemText">
                        <a class="p-2 text-white" href="/review">Отзывы</a>
                    </li>
                    <li class="nav-item liItemText">
                        <a class="p-2 text-white " href="/about">О нас</a>
                    </li>
                    <li class="nav-item liItemText">
                        <a class="p-2 text-white" href="#">Поддержка</a>
                    </li>
                    <li class="nav-item liItemText">
                        <a class="p-2 text-white" href="#">Корзина </a>
                    </li>
                    <li class="nav-item ">
                        <form class="form-inline my-2 my-lg-0">
                            <div style="  display: flex;">
                               
                            <a class="btn  btn-success "
                                    style="margin-bottom:5px; margin-left:20px;" type="submit" name="loginBtn" id="loginBtn">Вход</a>
                            </div>
                        </form>
                    </li>

            </div>
        </nav>
        <input class="" type="search" placeholder="Поиск по сайту"
                                    style="margin-left:25%; height:40px; width:50%; " aria-label="Search">
                                    <a class="btn  btn-primary  "
                                    style="margin-bottom:5px; margin-left:20px;" type="submit" name="searchBtn" id="searchBtn">Поиск</a>

    </div>

    @yield('end_main_header')
</body>

</html>