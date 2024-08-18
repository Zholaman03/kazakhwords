@extends('layouts.app')

@section('title', 'Главная')

@section('style')

<style>

    /* Көлеңке */
        .overlay {
            display: none; /* Жасырылған күйде болу керек */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Көлеңке түсі */
            z-index: 1000; /* жоғары деңгей */
        }

        /* aside стилі */
        .filter-aside {
            display: none; /* Жасырылған күйде болу керек */
            position: fixed;
            top: 0;
            right: 0;
            width: 300px; /* кеңдігі */
            height: 100%;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* көлеңке */
            z-index: 1001; /* жоғары деңгей */
            overflow-y: auto;
        }

        .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

    /* Скрываем стандартный чекбокс */
        .custom-checkbox input[type="checkbox"] {
            display: none;
        }

        /* Стилизация контейнера чекбокса */
        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 18px; /* Размер текста, если требуется */
        }

        /* Стилизация псевдоэлемента, заменяющего чекбокс */
        .custom-checkbox .checkmark {
            width: 25px;
            height: 25px;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
            position: relative;
            margin-right: 10px;
        }

        /* Стилизация для состояния "checked" */
        .custom-checkbox input[type="checkbox"]:checked + .checkmark::after {
            content: "";
            position: absolute;
            top: 4px;
            left: 9px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        /* Стилизация для псевдоэлемента "checked" */
        .custom-checkbox input[type="checkbox"]:checked + .checkmark {
            background-color: #2196F3;
            border: 1px solid #2196F3;
        }
        .filter{
            margin-right: 15px;
        }
        .border-words {
            border: 0.1px solid black;
            
            border-left: 10px solid blue; /* Ширина левого бордера */
        }


        .fa-regular, .fa-solid{
            font-size: 25px;
            
            cursor: pointer;
            transition: 0.2s;
        }
        .fa-regular:hover{
            font-size: 23px;
            
        }
        .fa-up-right-from-square{
            font-size: 25px;
        }
        .like, .comment, .share{
            font-size: 25px;

            
        }

        .actions{
            width: 40%;
        }

        .search-box{
            padding-right: 10px;
        }
        

        @media (max-width: 991px) {
            .author{
                width: 100% !important;
            }
            
        }

        @media (max-width: 1000.98px) {
            .actions {
                width: 100% !important;
            }
            
        }
</style>

@endsection
@section('content')
   

        <div class="container d-flex justify-content-between align-items-center mt-3">
            <form action="{{route('words.index')}}" method="GET" class="d-flex w-100 search-box">
                <input class="form-control me-2" type="search" id="search" placeholder="Поиск слова" value="{{old('search', $search)}}" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
            
        </div>
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}

            </div>
        @endif
        <div id="overlay" class="overlay" onclick="toggleAside()"></div>
            <aside id="filter-aside" class="filter-aside">
                <!-- Жабу кнопкасы -->
                <button class="btn-close" onclick="toggleAside()"></button>
                
                <form action="{{route('words.index')}}" method="GET">
                    <h5 style="color: #545452">Языки: </h5>
                    @foreach(App\Models\Language::all() as $language)
                    <div class="mt-3">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="lang[]" value="{{$language->id}}" @if(in_array($language->id, session('lang', []))) checked @endif>
                            <span class="checkmark"></span>
                            {{$language->lang}}
                        </label>
                    </div>
                    @endforeach
                    <hr>
                    <h5 style="color: #545452">Категорий: </h5>
                    @foreach(App\Models\Category::all() as $category)
                    <div class="mt-3">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="catg[]" value="{{$category->id}}" @if(in_array($category->id, session('catg', []))) checked @endif>
                            <span class="checkmark"></span>
                            {{$category->name}}
                        </label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-outline-success w-100 mt-3">Искать</button>
                </form>
            </aside>


            <aside id="filter-aside" class="filter-aside">
            <button class="btn-close" onclick="toggleAside()"></button>
                <form action="{{route('words.index')}}" method="GET">
                    <h5 style="color: #545452">Языки: </h5>
                    @foreach(App\Models\Language::all() as $language)
                    <div class="mt-3">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="lang[]" value="{{$language->id}}" @if(in_array($language->id, session('lang', []))) checked @endif>
                            <span class="checkmark"></span>
                            {{$language->lang}}
                        </label>
                    </div>
                    @endforeach
                    <hr>
                    <h5 style="color: #545452">Категорий: </h5>
                    @foreach(App\Models\Category::all() as $category)
                    <div class="mt-3">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="catg[]" value="{{$category->id}}" @if(in_array($category->id, session('catg', []))) checked @endif>
                            <span class="checkmark"></span>
                            {{$category->name}}
                        </label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-outline-success w-100 mt-3">Искать</button>
                </form>
            </aside>
        <div class="container-sm  d-flex justify-content-between">
            <div class="w-25  border border-1 p-3 mt-3 filter d-none d-md-block"  id="filter-block">
                <aside>
                 
                    
                    <form action="{{route('words.index')}}" method="GET">
                    <h5 style="color: #545452">Языки: </h5>
                        @foreach(App\Models\Language::all() as $language)
                        <div class="mt-3">
                            <label class="custom-checkbox">
                                <input type="checkbox" name="lang[]" value="{{$language->id}}" @if(in_array($language->id, session('lang', []))) checked @endif>
                                <span class="checkmark"></span>
                                {{$language->lang}}
                            </label>
                        </div>
                       
                    @endforeach
                    <hr>
                    <h5 style="color: #545452">Категорий: </h5>
                    @foreach(App\Models\Category::all() as $category)
                        <div class="mt-3">
                            <label class="custom-checkbox">
                                <input type="checkbox" name="catg[]" value="{{$category->id}}" @if(in_array($category->id, session('catg', []))) checked @endif>
                                <span class="checkmark"></span>
                                {{$category->name}}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-outline-success w-100 mt-3">Искать</button>
                    </form>
                </aside>
            </div>
        
            <div class="w-100 mt-3  border border-1 p-3">
                <div class="container mb-3 d-flex justify-content-between align-items-center mt-3">
                    <h4>Количество: {{$countWords}}</h2>
                    <div class="filter d-block d-md-none">
                        <button class="btn btn-outline-primary" onclick="toggleAside()"> Фильтр </button>
                    </div>
                </div>
                <hr>
            @if(!$words->isEmpty())
                @foreach($words as $word)

                        <div class="container w-100  border-words p-4 rounded mb-5 bg-body-tertiary shadow-lg d-flex justify-content-between align-items-center">
                            <div class="w-100">
                                <div class="text-muted row  ">
                                    <span class="col-sm ">{{$word->user->name}}</span>
                                    <span class="col-sm text-end">{{$word->updated_at->format('d F Y')}} год</span>
                                    
                                </div>
                                <hr/>
                                <div class="fw-light descrip row d-flex align-items-end">
                                     <i class="col-lg ">{!! nl2br(e($word->description)) !!}</i> <br>
                                     <i class="col-lg  text-end  w-100  author">(c) {{$word->author}}</i>
                                
                                </div>
                                <hr>
                                <div class="text-muted actions mt-4 d-flex justify-content-between ">
    
                                    <span class="like" id="react-like-button-{{$word->id}}"></span>
                                   
                                </div>
                            
                               
                            </div>
                            
                            
                        </div>

                    
                    @endforeach
                @else
                <h1>No</h1>
                @endif
                <div>
                {{ $words->appends(['catg' => request()->input('catg'), 'lang' => request()->input('lang'), 'search'=>request()->input('search')])->links() }}
                </div>
            </div>
         
           
        </div>

   @section('scripts')
   <script>
        function toggleAside() {
            var asideElement = document.getElementById("filter-aside");
            var overlayElement = document.getElementById("overlay");
            if (asideElement.style.display === "none") {
                asideElement.style.display = "block";
                overlayElement.style.display = "block";
            } else {
                asideElement.style.display = "none";
                overlayElement.style.display = "none";
            }
        }
    </script>
   @endsection

@endsection

