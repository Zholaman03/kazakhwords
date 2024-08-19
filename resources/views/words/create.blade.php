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
            <div class="col-md-6 w-100">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Создать</h5>
                        <form action="{{route('words.store')}}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="wordInput">Автор:</label>
                                <input type="text" class="form-control" id="wordInput" name="author" placeholder="Введите автор слова" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="descriptionTextarea">Слова автора:</label>
                                <textarea class="form-control" style="resize: none;" id="descriptionTextarea" name="description" rows="10" placeholder="Введите слова автора" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="cat" class="form-label">Категорий:</label>
                                <select name="category_id" id="cat" class="form-select">
                                    @foreach(App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Отправить на админ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection