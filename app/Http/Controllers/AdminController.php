<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AdminResource;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    
    public function index()
    {
        return view('user.admin');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllAdmin()
    {
        $dataadmin = AdminResource::collection(Admin::all());
        return response()->json($dataadmin);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'nip'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'notelp'=>'required',
            'avatar'=>'required',
        ]);

        $user = User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'admin'
        ]);

        $avatar='';
        if ($request->avatar) {
            $avatar = $request->avatar->store('avatars','public');
        }

        $user->admin()->create([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'notelp'=>$request->notelp,
            'avatar'=>$avatar,
        ]);
        if ($user) {
            return response()->json([
                'success'=>true,
                'type'=> 'add',
                'message'=>'Berhasil Menambahkan Admin',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'add',
            'message'=>'Gagal Menambahkan Admin'
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
        $admin = Admin::findOrFail($id);
        $adminResource = new AdminResource($admin);
        return response()->json($adminResource);
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
        $admin = Admin::findOrFail($id);
        $request->validate([
            'email'=>'required|email|unique:users,email,'.$admin->user->id,
            'nip'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'notelp'=>'required',
        ]);
        $avatar = $admin->avatar;
        if ($request->avatar) {
            if ($admin->avatar && file_exists(storage_path('app/public/'.$admin->avatar))) {
                Storage::delete('public/'.$admin->avatar);
            }
            $file = $request->avatar->store('avatars','public');
            $avatar = $file;
        }
        $admin->update([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'notelp'=>$request->notelp,
            'avatar'=>$avatar,
        ]);

        if ($request->password) {
            $admin->user()->update([
                'password'=> Hash::make($request->password),
            ]);
        }    
        $admin->user()->update([
            'email'=>$request->email,
        ]);

        if ($admin) {
            return response()->json([
                'success'=>true,
                'type'=> 'update',
                'message'=>'Berhasil Mengubah admin',
            ]);
        }
        return response()->json([
            'success'=>false,
            'type'=> 'update',
            'message'=>'Gagal Mengubah admin'
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
        $admin = Admin::findOrFail($id);
        if ($admin->avatar && file_exists(storage_path('app/public/'.$admin->avatar))) {
            Storage::delete('public/'.$admin->avatar);
        }
        $admin->user()->delete();
        $admin->delete();
            if ($admin) {
                return response()->json([
                    'success'=>true,
                    'type'=> 'delete',
                    'message'=>'Berhasil Menghapus Admin'
                ]);
            }
            return response()->json([
                'success'=>false,
                'type'=> 'delete',
                'message'=>'Gagal Menghapus Admin'
            ]);
    }
}
