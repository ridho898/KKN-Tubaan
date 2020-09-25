<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BeritaResource;
use App\Berita;
use App\Banner;
use App\Kegiatan;
use App\Profil;
use App\Imgprofil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\User;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('berita.index');
    }

    public function detail($id)
    {
        $jmlberita = Berita::count();
        $other = Berita::orderBy('id', 'desc')->take(1)->get();        
        $berita = Berita::where('id','<>',$id)->orderBy('id', 'desc')->limit(3)->get();
        $detailberita = Berita::leftJoin('admin','berita.admin_id','=','admin.id')->where('berita.id',$id)->get();
        return view('guestpart.guestberitadetail',compact('jmlberita','berita','detailberita'));
    }

    public function getAllBerita()
    {
        $databerita = BeritaResource::collection(Berita::all());        
        return response()->json($databerita);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'img'=>'required',            
        ]);            
        $img='';
        if ($request->img) {
            $img = $request->img->store('imgs','public');
        }
        $userid = DB::table('admin')->select('id')->where('user_id',Auth::user()->id)->get();
        foreach ($userid as $name) {
                    $u_id = $name->id;
        }
        $berita = Berita::create([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi, 
            'img'=>$img,             
            'admin_id'=>$u_id                         
        ]);        
        if ($berita) {
            return response()->json([
                'success'=>true,
                'type'=> 'add',
                'message'=>'Berhasil Menambahkan Berita',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'add',
            'message'=>'Gagal Menambahkan Berita'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $beritaresource = new BeritaResource($berita);
        return response()->json($beritaresource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $request->validate([        
            'judul'=>'required',
            'deskripsi'=>'required',        
        ]);

        $img = $berita->img;
        if ($request->img) {
            if ($berita->img && file_exists(storage_path('app/public/'.$berita->img))) {
                Storage::delete('public/'.$berita->img);
            }
            $file = $request->img->store('imgs','public');
            $img = $file;
        }

        $berita->update([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,            
            'img'=>$img,
        ]);                

        if ($berita) {
            return response()->json([
                'success'=>true,
                'type'=> 'update',
                'message'=>'Berhasil Mengubah Berita',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'update',
            'message'=>'Gagal Mengubah Berita'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->img && file_exists(storage_path('app/public/'.$berita->img))) {
            Storage::delete('public/'.$berita->img);
        }        
        $berita->delete();
            if ($berita) {
                return response()->json([
                    'success'=>true,
                    'type'=> 'delete',
                    'message'=>'Berhasil Menghapus Berita'
                ]);
            }
            return response()->json([
                'success'=>false,
                'type'=> 'delete',
                'message'=>'Gagal Menghapus Berita'
            ]);
    }
}
