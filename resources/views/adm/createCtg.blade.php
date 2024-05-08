@extends('layouts.adm')

@section('title', 'Создать категорий')

@section('content')
        <div class="container">
        
            <form action="{{route('adm.addCtg')}}" method="POST">
            <div class="input-group mb-3">
                
                    @csrf
                <input type="text" class="form-control" name="name" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                
            </div>
            </form>
            <ul class="list-group">
                @foreach($categories as $cat)
                <li class="list-group-item">{{$cat->name}}</li>
                @endforeach
            </ul>
    
        </div>
@endsection