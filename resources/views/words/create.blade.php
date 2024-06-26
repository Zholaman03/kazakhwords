@extends('layouts.user')

@section('title', 'Создать')

@section('content')
<div class="container mt-5">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>

        @endif
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}

            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Создать</h5>
                        <form action="{{route('words.store')}}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="wordInput">Кто автор:</label>
                                <input type="text" class="form-control" id="wordInput" name="author" placeholder="Enter a word" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="descriptionTextarea">Описание:</label>
                                <textarea class="form-control" id="descriptionTextarea" name="description" rows="3" placeholder="Enter a description" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection