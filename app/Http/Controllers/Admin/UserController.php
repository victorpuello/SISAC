<?php

namespace Ngsoft\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Ngsoft\DataTables\UsersDataTablesEditor;
use Ngsoft\Http\Requests\CreateUserRequest;
use Ngsoft\Http\Requests\UpdateUserRequest;
use Ngsoft\Transformers\Users\UserTransformer;
use Ngsoft\User;
use Ngsoft\Http\Controllers\Controller;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        if($request->ajax()){
            return datatables()->collection($users)->setTransformer( new UserTransformer())->toJson();
        }
        return view('admin.users.index',compact('users'));
    }

    public function store(UsersDataTablesEditor $editor)
    {
       return $editor->process(\request());
    }

    public function update(UsersDataTablesEditor $editor)
    {
        return $editor->process(\request());
    }

    public function destroy(UsersDataTablesEditor $editor)
    {
        return $editor->process(\request());
    }
}
