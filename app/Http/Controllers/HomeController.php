<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('user')){
            dd("user");
        }elseif(Auth::user()->hasRole('administrator')){
            return redirect()->route('admin.dashboard');
        }
    }
}
