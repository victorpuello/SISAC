<?php

namespace ATS\Imports;

use ATS\Model\{User,Docente};
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            if (!is_null($row[0])){
                DB::beginTransaction();
                try{
                    $user =  User::create([
                        'name' => $row[0],
                        'lastname' =>$row[1],
                        'email' =>$row[2],
                        'password' => strval($row[3]),
                        'username' =>$row[4],
                        'type' =>$row[5],
                        'path' => null
                    ]);
                    $user->assign($user->type);
                    if ($user->type === "docente"){
                        factory(Docente::class)->create([
                            'typeid' => "CC",
                            'name' => $user->full_name,
                            'user_id' => $user->id
                        ]);
                    }
                }catch (ValidationException $e){
                    DB::rollBack();
                    return redirect()->back();
                }
                DB::commit();
            }
        }
    }
}
