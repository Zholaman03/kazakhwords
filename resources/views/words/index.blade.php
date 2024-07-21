@extends('layouts.app')

@section('title', 'Главная')

@section('style')

<style>
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

        .fa-regular{
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
    <div class="container-sm  d-flex justify-content-between">
            <div class="w-25  border border-1 p-3 mt-3 filter d-none d-md-block">
                <aside>
                 
                    
                    <form action="{{route('words.index')}}" method="GET">
                    <h5 style="color: #545452">Языки: </h5>
                        @foreach(App\Models\Language::all() as $language)
                        <div class="mt-3">
                            <label class="custom-checkbox">
                                <input type="checkbox" name="lang[]" value="{{$language->id}}" >
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
                    <button type="submit" class="btn btn-outline-success">Искать</button>
                    </form>
                </aside>
            </div>
        
            <div class="w-100 mt-3  border border-1 p-3">
                <div class="container mb-3 d-flex justify-content-between align-items-center mt-3">
                    <h4>Количество: {{$countWords}}</h2>
                    <div class="filter">
                        <button class="btn btn-outline-primary"> Фильтр </button>
                    </div>
                </div>
                <hr>
            @if(!$words->isEmpty())
                @foreach($words as $word)

                        <div class="container w-75  border-words p-4 rounded mb-5 bg-body-tertiary shadow-lg d-flex justify-content-between align-items-center">
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
                                    <span  id="react-like-button"></span>
                                    <span class="like"><i class="fa-regular fa-heart "></i> 0</span>
                                    <span class="comment"><i class="fa-regular fa-comment"></i> 0</span>
                                    <span class="share"><i class="fa-solid fa-up-right-from-square"></i> 0</span>
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

   

@endsection

<!-- @section('script')
<script src="{{ mix('js/app.jsx') }}"></script>
@endsection -->