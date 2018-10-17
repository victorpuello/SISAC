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
    public function index(Request $request){
        $users = User::all();
        if($request->ajax()){
            return datatables()->collection($users)->setTransformer( new UserTransformer())->toJson();
        }
        return view('admin.users.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admin.users.ajax.create');
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request){
        $user = User::create($request->all());
        $user->assign($request->type);
       return redirect()->route('users.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user){
        return view('admin.users.ajax.edit',compact('user'));
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user){
        $user->update($request->all());
        $user->assign($request->type);
        return redirect()->route('users.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
