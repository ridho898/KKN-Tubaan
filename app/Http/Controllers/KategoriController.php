<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('kategori.index');
    }

    public function getAllKategori()
    {
        $kategoriall = Kategori::all();
        $number=1;
        $data =[];
        foreach ($kategoriall as $key) {
            $data[]=[
                'id'=>$key->id,
                'text'=>$key->nama,
                'number'=>$number++,
                'nama'=>$key->nama,
                'action'=>'<a data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm btn-edit" id="'.$key->id.'"><i class="fa fa-edit"></i></a> <a class="btn btn-sm btn-danger btn-delete" id="'.$key->id.'"><i class="fa fa-trash-o"></i></a>'
            ];
        }

        return response()->json($data);
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
            'nama'=>'required|min:3|max:100',
        ]);

        $kategori = Kategori::create($request->all());
        if ($kategori) {
            return response()->json([
                'success'=>true,
                'type'=> 'add',
                'message'=>'Berhasil Menambahkan Kategori'
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'add',
            'message'=>'Gagal Menambahkan Kategori'
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return response()->json($kategori);
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
        $request->validate([
            'nama'=>'required|min:3|max:100',            
        ]);
        $updatekategori = Kategori::where('id',$id)->update([
            'nama'=>$request->nama,            
        ]);
        if ($updatekategori) {
            return response()->json([
                'success'=>true,
                'type'=> 'update',
                'message'=>'Berhasil Mengubah Kategori'
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'update',
            'message'=>'Gagal Mengubah Kategori'
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
            $deletekategori = Kategori::where('id',$id)->delete();
            if ($deletekategori) {
                return response()->json([
                    'success'=>true,
                    'type'=> 'delete',
                    'message'=>'Berhasil Menghapus Kategori'
                ]);
            }
            return response()->json([
                'success'=>false,
                'type'=> 'delete',
                'message'=>'Gagal Menghapus Kategori'
            ]);
    }
}
