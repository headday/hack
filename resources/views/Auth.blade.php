@extends('welcome')
@section('form')
<form method="GET" action="{{route('resumeAuth')}}">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" name="login">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Войти</button>
    {{ csrf_field() }}
</form>

@endsection