@extends('personal-page')
    @section('content')
    @foreach($messages as $message)

    <div class="alert alert-primary" role="alert">
        @foreach($informationHR as $HR)
        <h4 class="alert-heading">{{$HR->name}}<br>{{$HR->email}}</h4>
        <p>Отклик: {{$message->message}}</p>
        @endforeach
    </div>
   
   
        

    @endforeach
    @endsection
    
    