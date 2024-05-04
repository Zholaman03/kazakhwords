@extends('layouts.app')

@section('title', 'Моя слова')

@section('content')
   


    <div class="container">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}

            </div>
        @endif
            <div class="container  mt-3 border border-1 p-3">
            @foreach($allwords as $word)
                  
                        <div class="container border border-1 position-relative p-4 rounded mb-3 bg-body-tertiary shadow-lg d-flex justify-content-between align-items-center">
                            <div>
                            <div class="fw-bold">{{$word->author}}</div>
                            <hr/>
                            <div class="fw-lighter">{{$word->description}}</div>
                            <div class="fw-light position-absolute top-0  start-50 rounded translate-middle badge bg-secondary text-wrap "  style="width: 6rem;">{{$word->user->name}}</div>
                            </div>
                            @can('delete', $word)
                            <div class="d-flex justify-content-between del-edit">
                               <a href="{{route('words.edit', $word->id)}}" class="btn btn-primary ml-3 "> <i class="bi bi-pencil-square"></i></a>
                               <form action="{{route('words.destroy', $word->id)}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                            @endcan
                        </div>

                    
                @endforeach
            </div>
          
    
        </div>

   

@endsection