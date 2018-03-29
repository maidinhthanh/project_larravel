<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;


class AdminController extends Controller
{
    public function getEdit($user_id){
        $user = DB::table('users')->where('user_id','=', $user_id)->get()->toArray();
        return view('admin/edit', ['user'=>$user[0]]);
    }

    public function postEdit(Request $request, $user_id){

        $user_get =  DB::table('users')->where('user_id','=',$user_id)->get()->toArray();
        //Tao Validator
        $messages =[
                'mail.required'=>'Mail không được để trống',
                'mail.email'=>'Email không hợp lệ',
                'pass.required'=>'Mật khẩu không được để trống',
                'pass.min'=>'Mật khẩu không được nhỏ hơn 3 kí tự',
                'pass.max'=>'Mật khẩu không được lớn 6 kí tự'];
         $rules = [
                'mail'=>'required|email',
                'pass'=>'required|min:3|max:6'];
         $Validator = Validator::make($request->all(),$rules, $messages);
         //Kiem tra validator
         if($Validator->passes()){
            $arr = DB::table('users')->where([['user_mail','=',$request->input('mail')],
                                              ['user_id','<>',$user_id]])->get();
            if ($arr->count()>0) {
                $loi = "Email đã tồn tại";
                return view('admin/edit', ['error'=>'$loi', 'user'=>$user_get[0]]);
            }else{
                $user = DB::table('users')->where('user_id','=', $user_id)
                                          ->update([
                                                    'user_full'=>$request->input('full'),
                                                    'user_name'=>$request->input('user'),
                                                    'user_pass'=>$request->input('pass'),
                                                    'user_mail'=>$request->input('mail'),
                                                    'user_level'=>$request->input('level')
                                                    ]);
            }

            Session::flash('alert', 'Tài Khoản được thêm thành công!');
            return redirect('admin');
         }else{
            // dd($Validator->errors()->all());

            return view('admin/edit', ['user'=>$user_get[0], 'message'=>$Validator->errors()->all()]);
         }
    }

    public function admin(){

        $users = DB::table('users')->paginate(2);
        return view('admin/admin', ['users'=>$users]);
    }

    public function getTest(){
    	return view('test_view');
    }


    public function getAdd(){
        return view('admin/add');
    }

    public function postAdd(Request $request){
        //Tao Validator
        $messages =[
                'mail.required'=>'Email không được để trống',
                'mail.email'=>'Email không hợp lệ',
                'pass.required'=>'Mật khẩu không được để trống',
                'pass.min'=>'Mật khẩu không được nhỏ hơn 3 kí tự',
                'pass.max'=>'Mật khẩu không được lớn 6 kí tự'];
         $rules = [
                'mail'=>'required|email',
                'pass'=>'required|min:3|max:6'];
         $validator = Validator::make($request->all(), $rules, $messages);

        //Kiem tra Validator
        if($validator->passes()){
            $user = DB::table('users')->where('user_mail', '=', $request->input('mail')) 
                                              ->get()->all();
            if(!empty($user)){
               $message = 'Email đã tồn tại';
                return view('admin/add', ['message'=>$message]);
            }
            else{
                 DB::table('users')->insert([
                                            'user_full'=>$request->input('full'),
                                            'user_name'=>$request->input('user'),
                                            'user_pass'=>$request->input('pass'),
                                            'user_mail'=>$request->input('mail'),
                                            'user_level'=>$request->input('level')
                                            ]);

                Session::flash('alertok', 'Thêm thành viên thành công');
                return redirect('admin');
            }
        }
        else {
            return view('admin/add', ['error'=>$validator->errors()->all()]);
        }
    }

    public function del ($user_id){
        DB::table('users')->where('user_id', $user_id)->delete();
        Session::flash('alertdel', 'Xóa thành viên thành công');
        return redirect('admin');
    }
}