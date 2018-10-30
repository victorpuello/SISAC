<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Model\{User,Docente};
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use ATS\Http\Requests\CreateUserRequest;
use ATS\Http\Requests\UpdateUserRequest;
use ATS\Transformers\Users\UserTransformer;

use ATS\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
     * @throws \Throwable
     */
    public function store(CreateUserRequest $request){
        DB::beginTransaction();
        try{
            $user = User::create($request->all());
            Docente::create([
                'typeid' => "CC",
                'name' => $user->full_name,
                'user_id' => $user->id
            ]);
            $user->assign($request->type);
        }catch (ValidationException $e){
            DB::rollBack();
            return redirect()->back();
        }
        DB::commit();
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
     * @throws \Exception
     */
    public function update(UpdateUserRequest $request, User $user){
        DB::beginTransaction();
        try{
            $user->update($request->all());
            if ($request->type === 'docente'){
                $user->docente->update([
                    'name' => $user->full_name,
                ]);
            }
            $user->assign($request->type);
        }catch (ValidationException $e){
            DB::rollBack();
            return redirect()->back();
        }
        DB::commit();
        $data = array(['msg'=>'Usuario guardado con exito']);
        return redirect()->route('users.index',compact('data'));
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
