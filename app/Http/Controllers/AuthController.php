<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller

{
    public function Index(Request $request){
        
        $value = Cookie::get('token');
        if(isset($value)){
            $decodeToken = explode('`',$value);
            $name = $decodeToken[3];
            $cont='personal-page';

            //dd($name);
            return view('home')->with(['name' => $name,'cont'=>$cont]);
        }
        else{
            $cont='welcome';
            return view('home')->with(['cont'=>$cont]);
        }
       
    }

    public function Exit(){

        return redirect('/')->withCookie(Cookie::forget('token'));

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
        return redirect('/resume');
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

        if($profile > 0){
            $name=Profile::select('name')
                ->where('login','=',$login)
                ->where('password','=',$password)->get();
                $name=$name->toJson();
                $name=json_decode($name);
                $name=$name[0]->name;


                $userId=Profile::select('id')
                ->where('login','=',$login)
                ->where('password','=',$password)->get();
                $userId=$userId->toJson();
                $userId=json_decode($userId);
                $userId=$userId[0]->id;

                // dd($name);
                $token_log=Profile::select('login')
                ->where('login','=',$login)
                ->where('password','=',$password)->get();
                $token_log = $token_log->toJson();   
                $token_log = json_decode($token_log);  
                $token_log = $token_log[0]->login;
             

                $token_pass=Profile::select('password')
                ->where('login','=',$login)
                ->where('password','=',$password)->get();

                $token_pass=md5($token_pass);

                $token_role=Profile::select('role_id')
                ->where('login','=',$login)
                ->where('password','=',$password)->get();
                $token_role = $token_role->toJson();   
                $token_role = json_decode($token_role);  
                $token_role = $token_role[0]->role_id;
                // dd($token_role);


                $token=$token_log.'`'.$token_pass.'`'.$token_role.'`'.$name.'`'.$userId;
                $token=Cookie::queue('token',$token,2000);
                //return view('personal-page')->with(['name'=>$name]);
                //return view('personal-page')->with(['name'=>$name]);
                return redirect('/');


           
        } 
        else{
            $message="Неверный логин или пароль";
            dump($message);
            //return redirect('/auth')->with(['message'=>$message]);
        }
    }

    public function PersPage(){

     return view('personal-page');
    }

}
