<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\Review;
use Illuminate\Support\Facades\Cookie;

class ResumeController extends Controller
{   
    public function Name(){

        $value=Cookie::get('token');
        $value = explode('`',$value);
        $name = $value[3];
        return $name;

    }
    public function inAkk(){

        $value=Cookie::get('token');

        if(isset($value)){

            $cont="personal-page";
        }
        else{
            $cont='welcome';
        }

        return $cont;
    }

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
    public function postHeartResume(Request $request){
        $req= $request->all();
        DB::INSERT("INSERT INTO favorite_resume (id_resume,id_hr) VALUES ({$req['resume_id']},{$req['user_id']})");
        return redirect('/resume');
    }

    public function GetAllResume(){
        $posts = Resume::all();
        $value = Cookie::get('token');
        if(isset($value)){
            $decodeToken = explode('`',$value);
            $name = $decodeToken[3];
            $cont='personal-page';
            $role = $decodeToken[2];
            $userId = $decodeToken[4];
            
            return view('resume')->with(['posts'=>$posts,'name' => $name,'cont'=>$cont,'role',$role,'userid'=>$userId]);
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
            $role = $decodeToken[2];

            
            return view('detailResume')->with(['resume' => $resume,'events' => $arr,'name' => $name,'cont'=>$cont,'role' => $role]);
        }
        else{
            $cont='welcome';
            return view('detailResume')->with(['resume' => $resume,'events' => $arr,'cont'=>$cont]);
        }
        


        //$evt = explode(',', $resume['items'][0]['attributes']);

        //return view('detailResume')->with(['resume' => $resume,'events' => $arr,'id' =>$id]);


    }



    





    public function addResume(Request $request) {

        $value = Cookie::get('token');
    
        $userId = explode('`',$value);

        $id = $userId[4];           


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


       $func=new ResumeController();
       $name=$func->Name();
       $cont=$func->inAkk();
        return view('add-resume')->with(['cont'=>$cont]);

   

    }

    public function showMyResume(){
        $value = Cookie::get('token');
       
        $userId = explode('`',$value);
        $name = $userId[3];
        $id = $userId[4];

        $resumes = Resume::select()->where('user_id','=',$id)->get();

        $func=new ResumeController();
        $cont=$func->inAkk();
        $name=$func->Name();
        return view('my-resumes')->with(['posts' => $resumes,'cont'=>$cont,'name'=>$name]);

        // $resumes::find($id)
        // dd($resumes);
       // return view('my-resumes')->with(['posts' => $resumes,'name' => $name]);


    }
    public function addMessage(Request $request) {
        $value = Cookie::get('token');
       
        $userId = explode('`',$value);
        $id = $userId[4];

        $data=$request->all();

        DB::insert('insert into reviews (message,hr_id,resume_id) values (?, ?,?)', [$data['message'], $id,$data['id']]);
        return view('personal-page');


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
