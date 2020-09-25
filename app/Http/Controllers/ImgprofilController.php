<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ImgprofilResource;
use App\Imgprofil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\User;

class ImgprofilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('imgprofil.index');
    }

    public function getAllImgprofil()
    {
        $dataimgprofil = ImgprofilResource::collection(Imgprofil::all());        
        return response()->json($dataimgprofil);
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
            'img'=>'required',            
        ]);            
        $img='';
        if ($request->img) {
            $img = $request->img->store('imgs','public');
        }
        
        $imgprofil = Imgprofil::create([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi, 
            'img'=>$img,                                                 
        ]);        
        if ($imgprofil) {
            return response()->json([
                'success'=>true,
                'type'=> 'add',
                'message'=>'Berhasil Menambahkan Imgprofil',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'add',
            'message'=>'Gagal Menambahkan Imgprofil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imgprofil  $imgprofil
     * @return \Illuminate\Http\Response
     */
    public function show(Imgprofil $imgprofil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imgprofil  $imgprofil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imgprofil = Imgprofil::findOrFail($id);
        $imgprofilresource = new ImgprofilResource($imgprofil);
        return response()->json($imgprofilresource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imgprofil  $imgprofil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imgprofil = Imgprofil::findOrFail($id);
        $request->validate([        
                           
        ]);

        $img = $imgprofil->img;
        if ($request->img) {
            if ($imgprofil->img && file_exists(storage_path('app/public/'.$imgprofil->img))) {
                Storage::delete('public/'.$imgprofil->img);
            }
            $file = $request->img->store('imgs','public');
            $img = $file;
        }

        $imgprofil->update([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,            
            'img'=>$img,
        ]);                

        if ($imgprofil) {
            return response()->json([
                'success'=>true,
                'type'=> 'update',
                'message'=>'Berhasil Mengubah Imgprofil',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'update',
            'message'=>'Gagal Mengubah Imgprofil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imgprofil  $imgprofil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imgprofil = Imgprofil::findOrFail($id);
        if ($imgprofil->img && file_exists(storage_path('app/public/'.$imgprofil->img))) {
            Storage::delete('public/'.$imgprofil->img);
        }        
        $imgprofil->delete();
            if ($imgprofil) {
                return response()->json([
                    'success'=>true,
                    'type'=> 'delete',
                    'message'=>'Berhasil Menghapus Imgprofil'
                ]);
            }
            return response()->json([
                'success'=>false,
                'type'=> 'delete',
                'message'=>'Gagal Menghapus Imgprofil'
            ]);
    }
}
