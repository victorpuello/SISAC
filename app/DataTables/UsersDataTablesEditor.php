<?php

namespace ATS\DataTables;

use http\Env\Response;
use ATS\Docente;
use ATS\User;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class UsersDataTablesEditor extends DataTablesEditor
{
    protected $model = User::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'sometimes|required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'lastname' => 'sometimes|required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|min:3|max:40',
            'username' => 'required|string|max:40|min:6|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'type' => 'required|in:admin,coordinador,docente,secretaria',
        ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
            'name' => 'sometimes|required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'lastname' => 'sometimes|required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|min:3|max:40',
            'username' => 'required|string|max:40|min:6|'. Rule::unique($model->getTable())->ignore($model->getKey()),
            'email' => 'sometimes|required|email|' . Rule::unique($model->getTable())->ignore($model->getKey()),
            'type' => 'required|in:admin,coordinador,docente,secretaria',
        ];
    }

    /**
     * Pre-create action event hook.
     *
     * @param Model $model
     * @return array
     */
    public function creating(Model $model, array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $data;
    }

    /**
     * @param Model $model
     * @param array $data
     * @return array
     */
    public function created(Model $model, array $data) {
        if ($data['type'] === 'docente'){
            Docente::create([
                'typeid' => "CC",
                'name' => $model->full_name,
                'user_id' => $model->id
            ]);
        }
        return $data;
    }
    /**
     * Pre-update action event hook.
     *
     * @param Model $model
     * @return array
     */
    public function updating(Model $model, array $data)
    {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        return $data;
    }

    /**
     * @param Model $model
     * @param array $data
     * @return array
     */
    public function deleted(Model $model, array $data) {
        return $data;
    }
    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }
}
