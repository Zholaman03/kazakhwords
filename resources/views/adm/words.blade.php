@extends('layouts.adm')

@section('title', 'Админ')

@section('content')
<div class="container">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}

            </div>
        @endif
        
            <div class="container  mt-3 border border-1 p-3">
            @foreach($words as $word)
                  
                        <div class="container border border-1 p-4 rounded mb-3 bg-body-tertiary shadow-lg d-flex justify-content-between align-items-center">
                            <div>
                            <div class="fw-bold">{{$word->author}}</div>
                            <hr/>
                            <div class="fw-lighter">{{$word->description}}</div>
                            <div class="fw-light">{{$word->user->name}}</div>
                            </div>
                            <div class="d-flex">
                                <form action="{{route('words.destroy', $word->id)}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button> 
                                </form>
                                @if($word->is_active)
                                <form action="{{route('adm.remove', $word->id)}}" method="post">
                                    @csrf 
                                    @method('PUT')
                                    <button class="btn btn-secondary">
                                    
                                            Убрать
                                    
                                        </button> 
                                        
                                </form>
                                @endif
                               <a href="{{route('adm.edit', $word->id)}}" class="btn btn-primary ml-3 ">Edit</a>
                            </div>
                        </div>

                    
                @endforeach
            </div>
          
    
        </div>
@endsection