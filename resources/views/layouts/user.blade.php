<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        @yield('styles')
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Мой профиль</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('words.index')}}">Главная</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('user.index')}}">Мой профиль</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('user.mywords')}}">Мои записи</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 position-relative" href="{{route('user.unactivies')}}">Отправленные записи
                    <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-secondary"> {{$count}} <span class="visually-hidden">unread messages</span></span>
                    </a>
                    @can('create', App\Models\Word::class)
                               
                                    <a class="list-group-item list-group-item-action list-group-item-light p-3 text-primary" href="{{route('words.create')}}">Создать</a>
                          
                            @endcan
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-secondary" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
                        
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
