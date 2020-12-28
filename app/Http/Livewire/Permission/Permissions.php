<?php

namespace App\Http\Livewire\Permission;

use App\Services\PermissionService;
use Livewire\Component;

class Permissions extends Component
{
    public $isUpdate = false;
    public $isCreate = true;
    public $permissionId;

    public $fields = ['name' => null];

    public function render(PermissionService $permissionService)
    {
        return view('livewire.permission.permissions', [
            'permissions' => $permissionService->getInstance()->all()
        ]);
    }

    public function submit(PermissionService $permissionService)
    {

        if (!isset($this->fields) || !is_array($this->fields)) return false;
        $permission = $permissionService->execute('create', $this->fields);
        if ($permission) {

            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;
    }

    public function editPermission(PermissionService $service, $id)
    {
        $permission = $service->getInstance()->find($id);
        $this->permissionId = $permission->id;
        $this->fields = $permission->toArray();
        $this->isUpdate = true;
        $this->isCreate = false;
    }
    public function update(PermissionService $service)
    {
        if (!isset($this->permissionId) || !is_int($this->permissionId)) return false;
        $r = $service->getInstance()->find($this->permissionId);

        if ($this->fields ===  $r->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('messages.nochange')
                ]
            );
        }

        if ($this->permissionId) {

            $r = $service->execute('update', $this->fields);

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

    public function deletePermission(PermissionService $service, $id)
    {
        if ($id) {
            $service->getInstance()->delete($id) ?
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
        $this->isCreate = true;
        $this->resetInput();
    }

    /**** private method ***/
    private function resetInput()
    {
        $this->fields = null;
    }

    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
