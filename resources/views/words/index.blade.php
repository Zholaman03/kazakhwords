@extends('layouts.app')

@section('title', 'Главная')


@section('content')
   


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
                            <div class="w-50">
                            <div class="fw-bold">{{$word->author}}</div>
                            <hr/>
                            <div class="fw-lighter">{{$word->description}}</div>
                            <div class="text-muted mt-4">
                                Создано: {{$word->created_at->format('Y-m-d')}}
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