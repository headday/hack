<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeController extends Controller
{
    public function GetAllResume(){
        $posts = Resume::all();
        return view('resume')->with(['posts'=>$posts]);
    }
    public function GetResumeWithId($id){
        
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
}
