<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Berita;
use App\Kegiatan;
use App\Banner;
use App\Profil;
use App\Imgprofil;
use App\Gallery;
use App\Kategori;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jmlberita = Berita::count();
        $other = Berita::orderBy('id', 'desc')->take(1)->get();
        $newberita = Berita::orderBy('id', 'desc')->take(1)->get();
        $berita = Berita::orderBy('id', 'desc')->skip(1)->limit(4)->get();
        $kegiatan = Kegiatan::orderBy('id', 'desc')->limit(3)->get();
        $banner =Banner::orderBy('id', 'desc')->get();
        $profil = Profil::get();
        $jmlkategori = Kategori::count();
        $kategori = Kategori::get();
        $gallery = Gallery::get();
        $jmlgallery = Gallery::count();
        $datagallery = Gallery::leftJoin('gallery_kategori','gallery.id','=','gallery_kategori.gallery_id')->leftJoin('kategori','gallery_kategori.kategori_id','=','kategori.id')->select('gallery.*','kategori.nama')->get();     
        $imgprofil = Imgprofil::get();
        // $berita = Berita::leftJoin('admin','berita.admin_id','=','admin.id')->limit(4)->get(); 
        return view('guesthome',compact('jmlberita','berita','newberita','banner','kegiatan','profil','imgprofil','kategori','gallery','jmlkategori','datagallery'));        
    }

    public function beritaIndex()
    {
        $jmlberita = Berita::count();
        $other = Berita::orderBy('id', 'desc')->take(1)->get();
        $newberita = Berita::orderBy('id', 'desc')->take(1)->get();
        $berita = Berita::orderBy('id', 'desc')->paginate(15);        
        // $berita = Berita::leftJoin('admin','berita.admin_id','=','admin.id')->limit(4)->get(); 
        return view('guestpart.guestberita',compact('jmlberita','berita','newberita'));        
    }

    public function kegiatanIndex()
    {
        $jmlkegiatan = Kegiatan::count();
        $other = Kegiatan::orderBy('id', 'desc')->take(1)->get();
        $newkegiatan = Kegiatan::orderBy('id', 'desc')->take(1)->get();
        $kegiatan = Kegiatan::orderBy('id', 'desc')->paginate(15);        
        // $kegiatan = Kegiatan::leftJoin('admin','kegiatan.admin_id','=','admin.id')->limit(4)->get(); 
        return view('guestpart.guestkegiatan',compact('jmlkegiatan','kegiatan','newkegiatan'));        
    }
}
