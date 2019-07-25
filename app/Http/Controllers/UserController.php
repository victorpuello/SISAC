<?php

namespace ATS\Http\Controllers;

use ATS\Model\{User,Docente};
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use ATS\Http\Requests\CreateUserRequest;
use ATS\Http\Requests\UpdateUserRequest;
use ATS\Transformers\Users\UserTransformer;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user){
        $user->update($request->all());
        return redirect()->route('user.show',$user);
    }
}
