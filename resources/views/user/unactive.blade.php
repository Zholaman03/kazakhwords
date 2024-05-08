@extends('layouts.user')

@section('title', 'Не активные записи')

@section('content')
   
    <div class="container">
        @if(!$words->isEmpty())
            <div class="container  mt-3 border border-1 p-3">
            
            @foreach($words as $word)

                        <div class="container  border border-1 position-relative p-4 rounded mb-5 bg-body-tertiary shadow-lg d-flex justify-content-between align-items-center">
                            <div class="w-50">
                            <div class="fw-bold">{{$word->author}}</div>
                            <hr/>
                            <div class="fw-lighter">{{$word->description}}</div>
                            <div class="fw-light position-absolute top-0  start-50 rounded translate-middle badge bg-secondary text-wrap "  style="width: 6rem;">{{$word->user->name}}</div>
                            </div>
                            @auth
                            @can('delete', $word)
                            
                            <span class="nav-item dropdown">
                                <a id="navbarDropdownMenu" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="fs-1">&hellip;</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenu">
                                   <a class="dropdown-item" href="{{route('words.edit', $word->id)}}">
                                       Редактировать
                                    </a>
                                    
                                    <form action="{{route('words.destroy', $word->id)}}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn btn-link dropdown-item text-danger">Удалить</button> 
                                    </form>
                                    
                                </div>
                            </span>
                            @endcan
                            @endauth
                        </div>

                    
                    @endforeach
                @else
                <h1>No</h1>
                @endif
            </div>
          
    
        </div>

   

@endsection