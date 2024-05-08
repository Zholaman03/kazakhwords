@extends('layouts.user')

@section('title', 'Мой профиль')

@section('content')
<div class="container">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}

            </div>
        @endif  
    
</div>
@endsection