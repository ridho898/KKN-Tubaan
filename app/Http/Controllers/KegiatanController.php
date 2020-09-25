<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\KegiatanResource;
use App\Kegiatan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kegiatan.index');
    }

    public function detail($id)
    {
        $jmlkegiatan = Kegiatan::count();
        $other = Kegiatan::orderBy('id', 'desc')->take(1)->get();        
        $kegiatan = Kegiatan::where('id','<>',$id)->orderBy('id', 'desc')->limit(3)->get();
        $detailkegiatan = Kegiatan::get();
        return view('guestpart.guestkegiatandetail',compact('jmlkegiatan','kegiatan','detailkegiatan'));
    }    

    public function getAllKegiatan()
    {
        $datakegiatan = KegiatanResource::collection(Kegiatan::all());        
        return response()->json($datakegiatan);
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
        
        $kegiatan = Kegiatan::create([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'tanggal'=>$request->tanggal, 
            'waktu'=>$request->waktu,
            'tempat'=>$request->tempat,
            'img'=>$img,                                                 
        ]);        
        if ($kegiatan) {
            return response()->json([
                'success'=>true,
                'type'=> 'add',
                'message'=>'Berhasil Menambahkan Kegiatan',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'add',
            'message'=>'Gagal Menambahkan Kegiatan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatanresource = new KegiatanResource($kegiatan);
        return response()->json($kegiatanresource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $request->validate([        
            'judul'=>'required',
            'deskripsi'=>'required',        
        ]);

        $img = $kegiatan->img;
        if ($request->img) {
            if ($kegiatan->img && file_exists(storage_path('app/public/'.$kegiatan->img))) {
                Storage::delete('public/'.$kegiatan->img);
            }
            $file = $request->img->store('imgs','public');
            $img = $file;
        }

        $kegiatan->update([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'tanggal'=>$request->tanggal, 
            'waktu'=>$request->waktu,
            'tempat'=>$request->tempat,            
            'img'=>$img,
        ]);                

        if ($kegiatan) {
            return response()->json([
                'success'=>true,
                'type'=> 'update',
                'message'=>'Berhasil Mengubah Kegiatan',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'update',
            'message'=>'Gagal Mengubah Kegiatan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        if ($kegiatan->img && file_exists(storage_path('app/public/'.$kegiatan->img))) {
            Storage::delete('public/'.$kegiatan->img);
        }        
        $kegiatan->delete();
            if ($kegiatan) {
                return response()->json([
                    'success'=>true,
                    'type'=> 'delete',
                    'message'=>'Berhasil Menghapus Kegiatan'
                ]);
            }
            return response()->json([
                'success'=>false,
                'type'=> 'delete',
                'message'=>'Gagal Menghapus Kegiatan'
            ]);
    }
}
