<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Validator;

use Session;

class LoginController extends Controller
{
	public function formLogin() {
		return view('admin/login');
	}

    public function login(Request $request) {
    //Tao Validator
        $messages =[
                'mail.required'=>'Mail khong duoc de trong',
                'mail.email'=>'Email khong hop le',
                'pass.required'=>'Mat khau khong duoc de trong',
                'pass.min'=>'MK khong nho hon 3 ki tu',
                'pass.max'=>'MK khong lon hon 6 ki tu'];
         $rules = [
                'mail'=>'required|email',
                'pass'=>'required|min:3|max:6'];
         $Validator = Validator::make($request->all(),$rules, $messages);

    //Kiem tra Validator
         if($Validator->passes()){
           $user = DB::table('users')->where([['user_mail','=', $request->input('mail')], 
                                              ['user_pass','=', $request->input('pass')]])
                                     ->get()->all();

           // dd($user);
            if(!empty($user)){
                Session()->put('mail', $request->input('mail'));
                Session()->put('pass', $request->input('pass'));
                return redirect('admin');
                // Khoi tao session


        }else{
            return view('admin/login', ['fail'=>'Tài Khoản Không Tồn Tại']);
        }

        }else{
            // return 'khong hop le';
            return view('admin/login', ['errors'=>$Validator->errors()->all()]);
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->intended('login');
    }
}
