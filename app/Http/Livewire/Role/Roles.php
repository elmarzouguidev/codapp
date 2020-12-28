<?php

namespace App\Http\Livewire\Role;

use App\Services\RoleService;
use Livewire\Component;

class Roles extends Component
{
    public $isUpdate = false;
    public $isCreate = true;

    public $addPermission = false;

    public $roleId;
    public $roleName = null;

    public $fields = ['name' => ''];
    public $permission = ['name' => '', 'role_id'];

    public function render(RoleService $roleService)
    {
        return view('livewire.role.__roles', [
            'roles' => $roleService->getInstance()->All()
        ]);
    }

    public function mount()
    {
    }

    public function submit(RoleService $roleService)
    {
        $this->isUpdate = true;

        $this->addPermission = false;

        if (!isset($this->fields) || !is_array($this->fields)) {
            return false;
        }
        $role = $roleService->execute('create', $this->fields);
        if ($role) {

            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;
    }

    public function addPermissionAction(RoleService $roleService, $id)
    {

        $role = $roleService->getInstance()->Find($id);
        if ($role) {
            $this->roleName = $role->name;
            $this->roleId = $role->id;
            $this->permission['role_id'] = $role->id;
            $this->addPermission = true;
        }
        $this->isUpdate = false;
        $this->isCreate = false;
    }

    public function addPermissionActionSave(RoleService $roleService)
    {
        if (!isset($this->roleId) || !is_int($this->roleId)) return false;
        if ($this->roleId) {
            $permission = $roleService->execute('createPermission', $this->permission);
            if ($permission) {
                $this->resetInput();
                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('messages.updated.ok')
                    ]
                );
            }
        }
    }

    public function editRole(RoleService $roleService, $id)
    {
        $role = $roleService->getInstance()->Find($id);
        $this->roleId = $role->id;
        $this->fields = $role->toArray();
        $this->isUpdate = true;
        $this->isCreate = false;
        $this->addPermission = false;
    }
    public function update(RoleService $roleService)
    {
        if (!isset($this->roleId) || !is_int($this->roleId)) return false;

        $r = $roleService->getInstance()->Find($this->roleId);

        if ($this->fields ===  $r->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('messages.nochange')
                ]
            );
        }

        if ($this->roleId) {

            $r = $roleService->execute('update', $this->fields);

            if ($r) {
                $this->resetInput();
                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('messages.updated.ok')
                    ]
                );
            }
        }
        return false;
    }
    public function deleteRole(RoleService $roleService, $id)
    {
        if ($id) {
            $roleService->getInstance()->delete($id) ?
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('messages.deleted.ok')
                    ]
                )
                :
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'error',
                        'message' => trans('messages.deleted.no')
                    ]
                );
        }
    }

    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetInput();
    }

    /**** private method ***/
    private function resetInput()
    {
        $this->fields = null;
        $this->permission = null;
    }

    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
