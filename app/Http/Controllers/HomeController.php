<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Berita;
use App\Banner;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Str;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jmlberita = Berita::count();
        $jmladmin = Admin::count();        
        $berita = Berita::paginate(15);        
        // $berita = str_limit($berita,100);
        return view('home',compact('jmlberita','jmladmin','berita'));        
    }
}
