<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google" value="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="fixed-to p-3 mb-2 bg-secondary w-auto p-3 text-white shadow-lg p-3  rounded">
       
        <ul class="nav justify-content-end">    
            <li class="nav-item">
                <span class="nav-link disable"><p class="text-white"><?
                use App\Models\Resume;
                use Illuminate\Support\Facades\Cookie;
                use App\Http\Controllers\ResumeController;
                 $name=new ResumeController();
                 $func=$name->Name();
                 echo $func;?></p></span>
              </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"><p class="text-white">Главная</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/resume"><p class="text-white">Вакансии</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/lk"><p class="text-white">Выход</p></a>
        </li>
      </ul></div>
      @extends('left-bar')
      {{-- @yield('content') --}}
      <div class="container">
        <div class="col-md-4 offset-4">
          
        
        </div>
        <div class="row" style="padding-left: 10%;">
          @yield('form-resume')
          @yield('content')
        </div>
    
      </div>
</body>
</html>