<?php

namespace App\Repositories\Permission;

use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{

    protected $model;

    protected static $_instance;

    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    /**
     * @return Permission
     */
    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }
    public function all()
    {
        return $this->getInstance()->all();
    }

    public function find($id)
    {
        return  $this->getInstance()->findOrFail($id);
    }

    public function select($attributes)
    {
        return  $this->getInstance()->select($attributes);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {

        return  $this->getInstance()->create($data);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        $permission =  $this->getInstance()->findOrFail($id);

        return $permission->update($data);
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return  $this->getInstance()->query();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $role =  $this->getInstance()->findOrFail($id);
        return $role->delete($id);
    }
}
