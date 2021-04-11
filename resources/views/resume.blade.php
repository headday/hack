@extends('welcome')
@section('content')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Начните вводить профиль</label>
    <input type="text" class="form-control" id="resume_search" placeholder="Профессия/вакансия">
</div>
<div class="form-check">
    <h2>Фильтры</h2>
    <input class="form-check-input" type="checkbox" value="" name="resume_stage">
    <label class="form-check-label" for="flexCheckChecked">
      Опыт работы
    </label>
  </div>

<div class="resumes">
    @foreach ($posts as  $post)
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
