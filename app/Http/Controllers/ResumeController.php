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
        
        $resume = Resume::find($id);
        dump($resume);
    }
}
