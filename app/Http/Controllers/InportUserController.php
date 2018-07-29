<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Ngsoft\Docente;
use Ngsoft\User;

class InportUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.import.importusers');
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
        $file = $request->file('archivo')->getRealPath();
        Excel::load($file, function($reader) {
            //dd($reader->get());
            foreach ($reader->get() as $user) {
               // dd($user);
               $usuario =  User::create([
                    'name' => $user->name,
                    'lastname' =>$user->lastname,
                    'email' =>$user->email,
                    'password' => $user->password,
                    'username' =>$user->username,
                    'type' =>$user->type,
               ]);
               if ($user->type === "docente"){
                    factory(Docente::class)->create([
                        'name' => $usuario->full_name,
                        'typeid' => $user->typeid,
                        'numberid' => $user->numberid,
                        'gender' => $user->gender,
                        'user_id' => $usuario->id,
                        'path' =>'no-user-image.png'
                    ]);
               }

            }
        },'UTF-8');
        return view('admin.import.importusers');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
