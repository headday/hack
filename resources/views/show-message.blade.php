@extends('personal-page')
    @section('content')
    @foreach($messages as $message)

    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">Имя</h4>
        <p>{{$message->message}}</p>
        
    </div>
   
   
        

    @endforeach
    @endsection
    
    