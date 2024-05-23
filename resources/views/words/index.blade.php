@extends('layouts.app')

@section('title', 'Главная')


@section('content')
   

<div class="container mt-3">
            <form action="{{route('words.index')}}" method="GET" class="d-flex">
                <input class="form-control me-2" type="search" id="search" placeholder="Поиск слова" value="{{old('search', $search)}}" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
        </div>
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}

            </div>
        @endif
            <div class="container  mt-3 border border-1 p-3">
            @if(!$words->isEmpty())
                @foreach($words as $word)

                        <div class="container  border border-1 position-relative p-4 rounded mb-5 bg-body-tertiary shadow-lg d-flex justify-content-between align-items-center">
                            <div class="w-75">
                            <div class="fw-bold">{{$word->author}}</div>
                            <hr/>
                            <div class="fw-light">{!! nl2br(e($word->description)) !!}</div>
                            <div class="text-muted mt-4">
                                Опубликовано: {{$word->updated_at->format('d F Y')}} год
                            </div>
                            
                            <div class="fw-light position-absolute top-0  start-50 rounded translate-middle badge bg-secondary text-wrap "  style="width: 6rem;">{{$word->user->name}}</div>
                            </div>
                            
                            
                        </div>

                    
                    @endforeach
                @else
                <h1>No</h1>
                @endif
            </div>
          
    
        </div>

   

@endsection

