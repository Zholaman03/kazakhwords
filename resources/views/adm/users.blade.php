@extends('layouts.adm')

@section('title', 'Users')

@section('content')
<div class="container">
        
            <div class="container  mt-3 border border-1 p-3">
            @foreach($users as $user)
                  
                        <div class="container border border-1 p-4 rounded mb-3 bg-body-tertiary shadow-lg d-flex justify-content-between align-items-center">
                            
                            <div class="fw-bold">{{$user->name}}</div>
                            <hr/>
                            <div class="fw-lighter">{{$user->email}}</div>

                        </div>

                    
                @endforeach
            </div>
          
    
        </div>
@endsection