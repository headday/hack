<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" value="notranslate">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="fixed-to p-3 mb-2 bg-secondary w-auto p-3 text-white shadow-lg p-3  rounded" ><ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" ><p class="text-white">Главная</p></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/resume"><p class="text-white">Вакансии</p></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/auth"><p class="text-white">Вход</p></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/registration"><p class="text-white">Регистрация</p></a>
  </li>
</ul></div>
{{-- @extends('left-bar') --}}
  <div class="container" style="padding-left: 10%;">
    <div class="col-md-4 offset-4">
      
      @yield('form-resume')
      @yield('form')
    </div>
    <div class="row">
     @yield('my-resumes')
      @yield('content')
    </div>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src="{{asset('script.js')}}"></script>
</body>
</html>