<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $title = 'dashboard';   
        return view('admin.dashboard')->with('title', $title);
    }

    public function about(){
        return view('admin.about');
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'Android App']
        );
        return view('admin.services')->with($data);
    }
}
