@extends('layouts.user')

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
            <div class="col-md-6 w-100">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Редактировать</h5>
                        <form action="{{route('words.update', $word->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mt-3">
                                <label for="wordInput">Автор:</label>
                                <input type="text" class="form-control" id="wordInput" value="{{$word->author}}" name="author" placeholder="Введите автор слова" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="descriptionTextarea">Описание:</label>
                                <textarea class="form-control" id="descriptionTextarea" name="description" rows="10" style="resize: none;" placeholder="Введите слова автора" required>{{$word->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Отправить изменение на админ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>
@endsection