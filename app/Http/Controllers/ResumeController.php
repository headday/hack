<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\Review;
use Illuminate\Support\Facades\Cookie;

class ResumeController extends Controller
{
    public function Notice(){

        $value = Cookie::get('token');
        
        if($value==null){
            return 0;
        }else{
            $userId = explode('`',$value);
            $id = $userId[4];
            $count=Review::select('id')->where('view',0)->where('resume_id',$id)->count();
            return $count;
        }
        
        

    }

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

        // $resume = Resume::join('users','resumes.user_id','=','users.id')->get();
        $resume = Resume::where('id','=',$id)->get();
        $resEvents = Resume::select('events')->where('id','=',$id)->get();
        $resEvents->toJson();
        $res = json_decode($resEvents,true);
        $res = $res[0]['events'];
        $arr = explode('`',$res);
        $value = Cookie::get('token');
        if(isset($value)){
            $decodeToken = explode('`',$value);
            $name = $decodeToken[3];
            $cont='personal-page';

            
            return view('detailResume')->with(['resume' => $resume,'events' => $arr,'name' => $name,'cont'=>$cont]);
        }
        else{
            $cont='welcome';
            return view('detailResume')->with(['resume' => $resume,'events' => $arr,'cont'=>$cont]);
        }
        


        //$evt = explode(',', $resume['items'][0]['attributes']);

        return view('detailResume')->with(['resume' => $resume,'events' => $arr,'id' =>$id]);


    }


    public function SaveResume($data){
        
    }

    public function showAddResume() {
        // $value = Cookie::get('token');
        // if(isset($value)){
        //     $decodeToken = explode('`',$value);
        //     $name = $decodeToken[3];
        //     $cont='personal-page';

        //     //dd($name);
        //     return view('add-resume')->with(['name' => $name,'cont'=>$cont]);
        // }
        // else{
        //     $cont='welcome';
        //     return view('add-resume')->with(['cont'=>$cont]);
        // }
    }


    public function addResume(Request $request) {

        $value = Cookie::get('token');
    
        $userId = explode('`',$value);
        $name = $userId[3];
        $id = $userId[4];

            //dd($name);
           
        

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
            'events' => $data['events']
        ];

        DB::insert("insert into `resumes` (age,address,phone,skills,education,work_experience,profession,stage,title_resume,events,user_id) 
        values('{$data['age']}','{$data['address']}','{$data['phone']}','{$data['skills']}',
        '{$data['education']}','{$data['work_experience']}','{$data['profession']}','{$data['stage']}','{$data['title_resume']}','{$data['events']}','$id')");
        return view('add-resume')->with(['name' => $name]);

   
    }

    public function showMyResume(){
        $value = Cookie::get('token');
       
        $userId = explode('`',$value);
        $name = $userId[3];
        $id = $userId[4];

        $resumes = Resume::select()->where('user_id','=',$id)->get();
        // $resumes::find($id)
        // dd($resumes);
        return view('my-resumes')->with(['posts' => $resumes,'name' => $name]);

    }
    public function addMessage(Request $request) {
        $value = Cookie::get('token');
       
        $userId = explode('`',$value);
        $id = $userId[4];

        $data=$request->all();
        // dd($data);
        DB::insert('insert into reviews (message,hr_id,resume_id) values (?, ?,?)', [$data['message'], $id,$data['id']]);
        return view('welcome');
    }

    public function showMessage(){
        $value = Cookie::get('token');
        $value = explode('`',$value);
        $name = $value[3];
        $id=$value[4];
        $message=Review::select('message')->where('resume_id',$id)->where('view',0)->get();
        
        return view('show-message')->with(['name'=>$name,'messages'=>$message,DB::update('update reviews set view=1 where resume_id='.$id)]);

    }

    
}
