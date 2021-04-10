@extends('welcome')

@section('form-resume')

<form method="POST" action="{{route('resumeStore')}}">
   <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Название резюме</label>
      <input type="input" class="form-control" name="age">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Возраст</label>
      <input type="input" class="form-control" name="age">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Адрес</label>
        <input type="text" class="form-control" name="address" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Телефон</label>
        <input type="text" class="form-control form-telephone" name="phone">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Навыки</label>
      <input type="text" class="form-control" name="skills">
    </div>
     <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Образование</label>
      <input type="text" class="form-control" name="education">
    </div>
    <div class="form-check">
      <input id="have_work" type="radio" class="form-check-input" name="work_experience">
      <label for="have_work">Есть опыт работы</label>
      </div>
      <div class="form-check mb-3">
      <input id="havent_work" type="radio" class="form-check-input" name="work_experience">
      <label for="havent_work">Нет опыта работы</label>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Профессия</label>
      <input type="text" class="form-control" name="profession">
    </div>
      
    <button type="submit" class="btn btn-primary mt-2">Сохранить и опубликовать</button>
    {{ csrf_field() }}
</form>

@endsection