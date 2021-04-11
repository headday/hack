<div class="fixed-top w-25 p-3" id="left-bar" style="margin: 100px 0px 0px 0px;">
  <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/my-resumes">Моё резюме</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/show-message">Сообщения<span class="badge rounded-pill bg-warning"><?
        use App\Models\Review;
        use App\Http\Controllers\ResumeController;
        $res=new ResumeController();
        echo $res->Notice();?></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/form-resume">Создать резюме</a>
        {{ csrf_field() }}
      </li>
    </ul>
</div>



