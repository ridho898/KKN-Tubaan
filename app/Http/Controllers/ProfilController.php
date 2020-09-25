<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProfilResource;
use App\Profil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profil.index');
    }

    public function getAllProfil()
    {
        $dataprofil = ProfilResource::collection(Profil::all());        
        return response()->json($dataprofil);
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
        
        $profil = Profil::create([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi, 
            'link'=>$request->link,
            'img'=>$img,                                             
        ]);        
        if ($profil) {
            return response()->json([
                'success'=>true,
                'type'=> 'add',
                'message'=>'Berhasil Menambahkan Profil',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'add',
            'message'=>'Gagal Menambahkan Profil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        $profilresource = new ProfilResource($profil);
        return response()->json($profilresource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);
        $request->validate([        
            'judul'=>'required',
            'deskripsi'=>'required',        
        ]);

        $img = $profil->img;
        if ($request->img) {
            if ($profil->img && file_exists(storage_path('app/public/'.$profil->img))) {
                Storage::delete('public/'.$profil->img);
            }
            $file = $request->img->store('imgs','public');
            $img = $file;
        }

        $profil->update([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,            
            'link'=>$request->link, 
            'img'=>$img,
        ]);                

        if ($profil) {
            return response()->json([
                'success'=>true,
                'type'=> 'update',
                'message'=>'Berhasil Mengubah Profil',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'update',
            'message'=>'Gagal Mengubah Profil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        if ($profil->img && file_exists(storage_path('app/public/'.$profil->img))) {
            Storage::delete('public/'.$profil->img);
        }        
        $profil->delete();
            if ($profil) {
                return response()->json([
                    'success'=>true,
                    'type'=> 'delete',
                    'message'=>'Berhasil Menghapus Profil'
                ]);
            }
            return response()->json([
                'success'=>false,
                'type'=> 'delete',
                'message'=>'Gagal Menghapus Profil'
            ]);
    }
}
