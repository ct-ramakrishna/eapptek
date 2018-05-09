<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PagesController extends Controller
{
    public function index(){
        $title='home page';
        // return view('pages.index',compact('title'));
        $id = Auth::id();
        if(!$id){
       // return redirect('/login')->with('title',$title);    
        }
        else
        return redirect('/dashboard')->with('title',$title);

    }
    // public function register(){
    //     return redirect('/register');
    // }

    // public function services(){
    //     $data=['webpage','development','testing','deliver'];
    //     return view('pages.services')->with('services',$data);
    // }
}
