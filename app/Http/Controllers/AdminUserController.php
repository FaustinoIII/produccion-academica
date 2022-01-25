<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminUserController extends Controller
{
    public function index_user(){
       return view('login');
       
    }
    
}