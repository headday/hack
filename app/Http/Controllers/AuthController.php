<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Profile;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{   public function Index(Request $request){
    
    $value=Cookie::get('token');
    
    if(isset($value)){
        $name=explode('.',$value)[0];
        echo $value;
      //  return view('welcome')->with(['name'=>$name]);
    }
        
    }
    public function Registration(Request $request){
        /* $this->validate($request,['FIO' => 'required|max:255',
        'Phone' => 'required', 'Stage' => 'required',
        'Staff' => 'required',]); */
        $data=$request->all();
        $endData = [
            'login' => $data['person_email'],
            'password' => $data['person_password'],
            'name' => $data['person_name'],
            'second_name' => $data['person_secondname'],
            'email' => $data['person_email'],
            'role_id' => $data['person_role'],
            
        ];
        DB::insert("insert into `users` (login,password,name,second_name,email,role_id) values('{$data['person_email']}','{$data['person_password']}','{$data['person_name']}','{$data['person_secondname']}','{$data['person_email']}','{$data['person_role']}')");
    }

    public function Auth(Request $request){
        $req= $request->all();
        $login = $req['login'];
        $password = $req['password'];
        $profile = new Profile;
        $profile = Profile::select()
        ->where('login','=',$login)
        ->where('password','=',$password)
        ->count();
      
               dump($req);             
        if($profile > 0){
            $name=Profile::select('name')
            ->where('login','=',$login)
            ->where('password','=',$password)->get();
            $name=$name->toJson();
            $name=json_decode($name);
            $name=$name[0];
            $token_log=Profile::select('login')
            ->where('login','=',$login)
            ->where('password','=',$password)->get();
            $token_pass=Profile::select('password')
            ->where('login','=',$login)
            ->where('password','=',$password)->get();
            $token_pass=md5($token_pass);
            $token_role=Profile::select('role_id')
            ->where('login','=',$login)
            ->where('password','=',$password)->get();
            //$token=$token_log.'.'.$token_pass.'.'.$token_role;
            //$token=Cookie::queue('token',$token,60);
            return view('personal-page')->with(['name'=>$name]);
           //return view('personal-page')->with(['name'=>$name]);
           //return redirect('/lk');
           
        } 
        else{
            $message="Неверный логин или пароль";
            dump($message);
            //return redirect('/auth')->with(['message'=>$message]);
        }
    }

    // public function Redirect(){

    //     return redirect('/lk')->cookie($this->token);

    // }

    public function PersPage(){

     return view('personal-page');
    }

}
