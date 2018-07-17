<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin==1) {
          $id             = Auth::user()->id;
          $admins         = User::find($id);
          return view('homeAdmin');
        }
        else {
          return view('home');
        }
}
    public function index2()
    {
        if(auth()->user()->isAdmin==0) {
          $id             = Auth::user()->id;
          $admins         = User::find($id);
          return view('Peneliti/home');
        }
        else {
          return view('home');
        }
    }
    public function admin()
    {
        return view('admin');
    }
}
