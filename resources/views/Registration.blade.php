@extends('welcome')
@section('form')
<form method="POST" action="{{route('resumeStore')}}">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Имя</label>
      <input type="text" class="form-control" name="person_name" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Фамилия</label>
        <input type="text" class="form-control" name="person_secondname" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" name="person_email" >
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="person_password">
    </div>
    <select class="role_select form-select" name="person_role" >
        <option value="1">Студент выпускник</option>
        <option value="2">HR/Представитель образовательной организации</option>
      </select>
      <div class="mb-3 role_hr_input" hidden>
        <label for="exampleInputEmail1" class="form-label">Имя организации</label>
        <input type="text" class="form-control" name="peroson_org">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Зарегистроваться</button>
    {{ csrf_field() }}
</form>
@endsection