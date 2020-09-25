<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GalleryResource;
use App\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery.index');
    }

    public function getAllGallery()
    {
        $datagallery = GalleryResource::collection(Gallery::leftJoin('gallery_kategori','gallery.id','=','gallery_kategori.gallery_id')->leftJoin('kategori','gallery_kategori.kategori_id','=','kategori.id')->select('gallery.*','kategori.nama')->get()); 
        return response()->json($datagallery);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'img'=>'required'
        ]);
        $foto='';
        if ($request->img) {
            $foto = $request->img->store('img','public');
        }
        $gallery = Gallery::create([            
            'img'=>$foto
        ]);

        $gallery->kategori()->attach($request->kategori);
        if ($gallery) {
            return response()->json([
                'success'=>true,
                'type'=> 'add',
                'message'=>'Berhasil Menambahkan Gallery',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'add',
            'message'=>'Gagal Menambahkan Gallery'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $galleryresource = new GalleryResource($gallery);
        return response()->json($galleryresource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);        
        $img = $gallery->img;
        if ($request->img) {
            if ($gallery->img && file_exists(storage_path('app/public/'.$gallery->img))) {
                Storage::delete('public/'.$gallery->img);
            }
            $file = $request->img->store('imgs','public');
            $img = $file;
        }
        $gallery->update([
            'img'=>$img
        ]);

        $gallery->kategori()->sync($request->kategori);
        if ($gallery) {
            return response()->json([
                'success'=>true,
                'type'=> 'update',
                'message'=>'Berhasil Mengubah Gallery',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'update',
            'message'=>'Gagal Mengubah Gallery'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletegallery = Gallery::where('id',$id)->delete();
            if ($deletegallery) {
                return response()->json([
                    'success'=>true,
                    'type'=> 'delete',
                    'message'=>'Berhasil Menghapus Gallery'
                ]);
            }
            return response()->json([
                'success'=>false,
                'type'=> 'delete',
                'message'=>'Gagal Menghapus Gallery'
            ]);
    }
}
