<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Resume;


class ResumeController extends Controller
{
    public function GetAllResume(){
        $posts = Resume::all();
        return view('resume')->with(['posts'=>$posts]);
    }

    public function GetResumeWithId($id){
        $resume = Resume::find($id);
        dump($resume);
    }

    public function addResume(Request $request) {

        $data=$request->all();
        $endData = [
            'age' => $data['age'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'skills' => $data['skills'],
            'education' => $data['education'],
            'work_experience' => $data['work_experience'],
            'profession' => $data['profession'],
            'stage' => $data['stage'],
            'title_resume' => $data['title_resume'],
            'events' => $data['events'],
            'image' => $data['image']
        ];

        DB::insert("insert into `resumes` (age,address,phone,skills,education,work_experience,profession,stage,title_resume,events,user_id) 
        values('{$data['age']}','{$data['address']}','{$data['phone']}','{$data['skills']}',
        '{$data['education']}','{$data['work_experience']}','{$data['profession']}','{$data['stage']}','{$data['title_resume']}','{$data['events']}','$user_id')");
    }
}
