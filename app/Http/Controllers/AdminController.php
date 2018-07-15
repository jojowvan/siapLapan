<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
  {
   // $id             = Auth::user()->id;
   // $admins         = Admin::find($id);
   return view('admin');
  }

    public function view()
  {
    return view('/tambahStaff');
  }

    public function create(Request $request)
  {
    $this->validate($request, array(
            'name'          => 'required|max:100',
            'email'         => 'required|unique:users,email,',
            'password'      => 'required|max:100',
            'identitas'     => 'required',
            'jabatan'        => 'required',
            //'avatar'        => 'mimes:jpeg,jpg,png,gif|max:10000'
        ));

    $user   = User::create([
            'name'           => $request->input('name'),
            'email'          => $request->input('email'),
            'password'       => Hash::make($request->input('password')),
            'identitas'      => $request->input('identitas'),
            'isAdmin'        => $request->input('jabatan'),
        ]);

    session()->flash('success', 'Tambah Anggota Berhasil!');
    return redirect()->back();
    //echo 'aaa';
  }

}
