@extends('layouts.app')

@section('title', 'Пользовательская инструкция')
@section('style') 
<style>
    .video-container {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%; /* 16:9 пропорциясы */
    }

    .video-container iframe, 
    .video-container video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
   @media (max-width: 768px) {
    .video-container {
        width: 100%;
        height: auto;
    }
    
    .video-container video{
        width: 100%;
        height: auto;
    }
}

</style>
@endsection
@section('content')
<div class="container">
    <h1>Пользовательская инструкция</h1>
    <div class="row">
            <!-- Создать пост -->
            <div class="col-md-6 m-3">
                <div class="card">
                    <div class="card-header fs-4">
                        Как создать свой текст?
                    </div>
                    <div class="card-body">
                        <p class="card-text">Если вы хотите создать свой текст,
                             сначала нужно зарегистрироваться 
                             (<a class="text-decoration-none" href="{{route('signup.form')}}">Регистрация</a>).
                              Если вы уже зарегистрированы, войдите с помощью электронной почты и пароля 
                              (<a class="text-decoration-none" href="{{route('login')}}">Вход</a>). 
                              После успешной авторизации вы сможете создать свой текст. Обратите внимание, 
                              что ваш текст будет опубликован только после проверки администратором.</p>
                              <div class="video-container">
                                <video controls>
                                    <source src="{{ asset('storage/videos/create.mp4') }}" type="video/mp4">
                                    Ваш браузер не поддерживает видео тег.
                                </video>
                              </div>
                        </div>
                    </div>
            </div>
            
            <!-- Удалить пост -->
            <div class="col-md-6 m-3">
                <div class="card">
                    <div class="card-header fs-4">
                        Как удалить свой текст?
                    </div>
                    <div class="card-body">
                        <p class="card-text">Если вы хотите удалить свой текст, вам тоже необходимо пройти авторизацию (<a class="text-decoration-none" href="{{route('login')}}">Вход</a>). 
                        </p>
                            <div class="video-container">
                                <video controls>
                                    <source src="{{ asset('storage/videos/delete.mp4') }}" type="video/mp4">
                                    Ваш браузер не поддерживает видео тег.
                                </video>
                              </div>
                    </div>
                </div>
            </div>
            
            <!-- Редактировать пост -->
            <div class="col-md-6 m-3">
                <div class="card">
                    <div class="card-header fs-4">
                       Как редактировать свой пост
                    </div>
                    <div class="card-body">
                        <p class="card-text">Если вы хотите изменить свой текст, вам необходимо пройти авторизацию (<a class="text-decoration-none" href="{{route('login')}}">Вход</a>),  
                        и изменения будут опубликованы только после проверки администратором.</p>
                        <div class="video-container">
                                <video controls>
                                    <source src="{{ asset('storage/videos/edit.mp4') }}" type="video/mp4">
                                    Ваш браузер не поддерживает видео тег.
                                </video>
                              </div>
                    </div>
                </div>
            </div>
        </div>
        
       
</div>
    
@endsection