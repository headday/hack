@extends('personal-page')
    @section('content')
    @foreach($messages as $message)
    <div>
        {{$message->message}}
    </div>
    @endforeach
    @endsection
    
    