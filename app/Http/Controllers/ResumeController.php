<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Cookie;


class ResumeController extends Controller
{
    public function GetAllResume(){
        $posts = Resume::all();
        $value = Cookie::get('token');
        if(isset($value)){
            $decodeToken = explode('`',$value);
            $name = $decodeToken[3];
            $cont='personal-page';

            
            return view('resume')->with(['posts'=>$posts,'name' => $name,'cont'=>$cont]);
        }
        else{
            $cont='welcome';
            return view('resume')->with(['posts'=>$posts,'cont'=>$cont]);
        }
        
    }

    public function GetResumeWithId($id){

        $resume = Resume::find($id);
       // dump($resume);

        
        $resume = Resume::find($id)->join('users','resumes.user_id','=','users.id')->get();
        $resEvents = Resume::select('events')->where('id','=',$id)->get();
        $resEvents->toJson();
        $res = json_decode($resEvents,true);
        $res = $res[0]['events'];
        $arr = explode('`',$res);


        //$evt = explode(',', $resume['items'][0]['attributes']);
        return view('detailResume')->with(['resume' => $resume,'events' => $arr]);
    }
    public function SaveResume($data){
        
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
