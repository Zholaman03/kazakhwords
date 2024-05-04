@extends('layouts.adm')

@section('title', 'Админ')

@section('content')
<div class="container">
        
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
                                <form action="
                                        @if(!$word->is_active) 
                                            {{route('adm.active', $word->id)}}
                                        @else
                                            {{route('adm.remove', $word->id)}}
                                        @endif
                                " method="post">
                                    @csrf 
                                    @method('PUT')
                                    <button class="btn {{$word->is_active ? 'btn-secondary' : 'btn-success'}}">
                                        @if(!$word->is_active) 
                                            Принять
                                        @else
                                            Убрать
                                        @endif
                                        </button> 
                                        
                                </form>
                               
                               <a href="{{route('words.edit', $word->id)}}" class="btn btn-primary ml-3 ">Edit</a>
                            </div>
                        </div>

                    
                @endforeach
            </div>
          
    
        </div>
@endsection