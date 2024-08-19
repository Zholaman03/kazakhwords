@extends('layouts.user')

@section('title', 'Мой профиль')

@section('styles')
<style>
        .profile-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .profile-card img {
            width: 100%;
            height: auto;
        }
        .profile-card .card-body {
            text-align: center;
        }
        .profile-card .card-title {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .profile-card .card-subtitle {
            margin: 0;
            font-size: 1.1rem;
            color: #6c757d;
        }
        .profile-card .card-text {
            margin-top: 1rem;
            color: #495057;
        }
    </style>
@endsection
@section('content')
<div class="container">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}

            </div>
        @endif  
        
    
</div>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card profile-card">
                    <img src="https://via.placeholder.com/400x200" alt="Profile Image">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">ID: {{$user->id}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Email: {{$user->email}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Создано: {{$user->created_at->format('d F Y')}}</h6>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection