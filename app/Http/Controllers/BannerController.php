<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BannerResource;
use App\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banner.index');
    }

    public function getAllBanner()
    {
        $databanner = BannerResource::collection(Banner::all());        
        return response()->json($databanner);
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
            'toptext'=>'required',
            'lowertext'=>'required',
            'img'=>'required',                        
        ]);            
        $img='';
        if ($request->img) {
            $img = $request->img->store('imgs','public');
        }
        
        $banner = Banner::create([
            'toptext'=>$request->toptext,
            'lowertext'=>$request->lowertext, 
            'link'=>$request->link,
            'img'=>$img,                                                 
                                                             
        ]);        
        if ($banner) {
            return response()->json([
                'success'=>true,
                'type'=> 'add',
                'message'=>'Berhasil Menambahkan Banner',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'add',
            'message'=>'Gagal Menambahkan Banner'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $bannerresource = new BannerResource($banner);
        return response()->json($bannerresource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $request->validate([        
            'toptext'=>'required',
            'lowertext'=>'required',        
        ]);

        $img = $banner->img;
        if ($request->img) {
            if ($banner->img && file_exists(storage_path('app/public/'.$banner->img))) {
                Storage::delete('public/'.$banner->img);
            }
            $file = $request->img->store('imgs','public');
            $img = $file;
        }

        $banner->update([
            'toptext'=>$request->toptext,
            'lowertext'=>$request->lowertext,            
            'img'=>$img,
            'link'=>$request->$link,
        ]);                

        if ($banner) {
            return response()->json([
                'success'=>true,
                'type'=> 'update',
                'message'=>'Berhasil Mengubah Banner',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'update',
            'message'=>'Gagal Mengubah Banner'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner->img && file_exists(storage_path('app/public/'.$banner->img))) {
            Storage::delete('public/'.$banner->img);
        }        
        $banner->delete();
            if ($banner) {
                return response()->json([
                    'success'=>true,
                    'type'=> 'delete',
                    'message'=>'Berhasil Menghapus Banner'
                ]);
            }
            return response()->json([
                'success'=>false,
                'type'=> 'delete',
                'message'=>'Gagal Menghapus Banner'
            ]);
    }
}
