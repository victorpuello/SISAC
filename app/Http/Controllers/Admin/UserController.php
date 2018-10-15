<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Model\User;
use Illuminate\Http\Request;
use ATS\DataTables\UsersDataTablesEditor;
use ATS\Http\Requests\CreateUserRequest;
use ATS\Http\Requests\UpdateUserRequest;
use ATS\Transformers\Users\UserTransformer;

use ATS\Http\Controllers\Controller;
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
        return view('admin.users.index');
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
