<?php

namespace App\Http\Livewire\Moderator;

use App\Services\AuthService;
use App\Services\CityService;
use App\Services\ModeratorService;
use App\Services\PermissionService;
use Livewire\Component;

class Moderators extends Component
{
    public $isUpdate = false;

    public $fields = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'password' => '',
        'city_id' => '',
        'address' => '',
        'tele' => '',

    ];
    public $selectes = [];

    public $selected = [];

    public $moderatorId;

    public function render(ModeratorService $moderatorService, CityService $cityService, PermissionService $permissionService)
    {
        $moderators = $moderatorService->getInstance()
            ->with(['ville'])
            ->get();
        $villes = $cityService->getInstance()->getSelect(['id', 'name']);
        $permissions = $permissionService->getInstance()->select(['id', 'name'])->get();

        return view('livewire.moderator.__moderators', [

            'moderators' => $moderators,
            'villes' => $villes,
            'permissions' => $permissions

        ]);
    }

    public function mount()
    {
    }

    public function submit(ModeratorService $moderatorService, AuthService $authService)
    {
        //  dd($this->selectes);
        if (!isset($this->fields) || !is_array($this->fields)) {
            return false;
        }
        $admin = $authService->getInstance()->loggedUser()->fullname;
        $user = $moderatorService->execute('create', array_merge($this->fields, ['permissions' => $this->selectes, 'addedBy' => $admin]));
        if ($user) {

            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;
    }

    public function editModerator(ModeratorService $moderatorService, $id)
    {
        $user = $moderatorService->getInstance()->findOrFail($id);
        $this->moderatorId = $user->id;
        $this->fields = $user->toArray();
        $this->isUpdate = true;
    }

    public function update(ModeratorService $moderatorService)
    {
        if (!isset($this->moderatorId) || !is_int($this->moderatorId)) return false;

        $user = $moderatorService->getInstance()->findOrFail($this->moderatorId);

        if ($this->fields === $user->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('messages.nochange')
                ]
            );
        }

        if ($this->moderatorId) {

            $user = $moderatorService->execute('update', $this->fields);

            if ($user) {
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

    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetInput();
    }

    public function deleteModerator(ModeratorService $moderatorService, $id)
    {
        if ($id) {
            $moderatorService->getInstance()->delete($id) ?
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
