@extends("personal-page")
@section('my-resumes')


<div class="resumes">
    @foreach ($posts as $post)
    <div class="card mb-2" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$post->title_resume}}</h5>
          <p class="card-text">Стаж: {{$post->age}} лет, <br> Телефон: {{$post->phone}} </p>
          <p class="card-text">Навыки: {{$post->skills}}</p>
          <a href="/resume/{{$post->id}}" class="btn btn-primary">Перейти</a>
        </div>
      </div>
    @endforeach
</div>

@endsection
