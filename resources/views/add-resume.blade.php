@extends('welcome')

@section('form-resume')

<form method="POST" action="{{route('addResume')}}" enctype="multipart/form-data">
    
  <input type="file"name="image"> 
   <div class="mt-4 mb-3">
      <label for="exampleInputEmail1" class="form-label"><strong>Название резюме</strong></label>
      <input type="text" class="form-control" name="title_resume">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Возраст</label>
      <input type="number" class="form-control" name="age">
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
      <label for="exampleInputPassword1" class="form-label">Ваши навыки</label>
      <input type="text" class="form-control" name="skills">
      <button class="btn btn-dark mt-2" type="button">Добавить</button>
    </div>

     <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Мероприятия, в которых вы участвовали</label>
      <input type="text" class="form-control" name="events">
      <button class="btn btn-dark mt-2" type="button">Добавить</button>
    </div>

     <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Образование</label>
      <input type="text" class="form-control" name="education">
    </div>
   

    <div class="form-check mb-1">
      <input id="have_work" type="radio" class="form-check-input" name="work_experience" value="Есть опыт работы">
      <label for="have_work">Есть опыт работы</label>
    </div>
     
      <div class="mb-2 stage-block" hidden>
        <label for="stage" class="form-label">Стаж</label>
        <input id="stage" type="number" class="form-control" name="stage">
      </div>

    <div class="form-check mb-3">
      <input id="havent_work" type="radio" class="form-check-input" name="work_experience" value="Нет опыта работы">
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