<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class TestController extends Controller
{
    public function test(){
    	Session()->put('user', 'admin');
    	dd(session()->all());
    }
}
