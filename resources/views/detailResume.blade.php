@extends("$cont")
@section('content')
@foreach ($resume as  $res)
    <div class="card" style="width: 52rem;">
        <h1>{{$res-> title_resume}}</h1>
        <h2>{{$res -> name}} {{$res -> second_name}}</h2>
        <p>
            Образование {{$res -> education}}
            Опыт работы {{$res -> stage}}
            
        </p>
        <p>Участие в мероприятиях</p>
        <div>
            @foreach ($events as $event)
            
            <button type="button" class="btn btn-info" disabled>{{$event}}</button>
            @endforeach
            <textarea name="message"></textarea>
            <button type="button" class="btn btn-info">Отправить</button>
        </div>
    </div>
@endforeach
@endsection