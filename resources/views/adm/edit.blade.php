@extends('layouts.adm')

@section('title', 'Редактировать')

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
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Редактировать</h5>
                        <form action="{{route('adm.active', $allWords->id)}}" method="POST" id="textForm">
                            @csrf
                            @method('PUT')
                            <div class="form-group mt-3">
                                <label for="wordInput">Автор:</label>
                                <input type="text" class="form-control" id="wordInput" value="{{$allWords->author}}" name="author" placeholder="Enter a word" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="descriptionTextarea">Описание:</label>
                                <textarea class="form-control" id="descriptionTextarea" name="description" rows="6" placeholder="Enter a description" required>{{$allWords->description}}</textarea>
                            </div>
                            <div class="form-group mt-3">
                            <label for="cat" class="form-label">Категорий:</label>
                                <select name="category_id" id="cat" class="form-select">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                            <label for="cat" class="form-label">Язык:</label>
                                <select name="language_id" id="lan" class="form-select">
                                    @foreach(App\Models\Language::all() as $language)
                                        <option value="{{ $language->id }}">{{ $language->lang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Принять</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

