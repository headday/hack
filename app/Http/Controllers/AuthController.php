<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Profile;

class AuthController extends Controller
{
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
      
                            
        if($profile > 0){
             return redirect('/');
        } 
    }
}
