<?php

namespace App\Http\Livewire;

use App\Traits\UserTrait;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ManageUser extends Component
{
    use UserTrait, LivewireAlert;

    public $users = [];
    public $perPage = 10;
    public $search;
    public $modal = false;
    public $isEdit = false;

    public $userId;
    public $name;
    public $email;
    public $gender;
    public $status;

    protected $listeners = [
        'confirmed'
    ];

    public function mount()
    {
        $query = [
            'per_page' => $this->perPage
        ];

        // trigger UserTrait::getUser in 'app/Traits/UserTrait'
        $this->users = $this->getUser($query);
    }

    public function updatedPerPage($val)
    {
        if ($this->search) {
            $query = [
                'name' => $this->search,
                'email' => $this->search,
            ];
        } else {
            $query = [
                'per_page' => $val
            ];
        }

        // trigger UserTrait::getUser in 'app/Traits/UserTrait'
        $this->users = $this->getUser($query);
    }

    public function updatedSearch($val)
    {
        if (strlen($val) > 2)
            $query = [
                'name' => $val,
                'email' => $val,
            ];
        else
            $query = [
                'per_page' => $this->perPage
            ];

        // trigger UserTrait::getUser in 'app/Traits/UserTrait'
        $this->users = $this->getUser($query);
    }

    public function openModal($user = null)
    {
        if ($user) {
            $user = json_decode($user);
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->gender = $user->gender;
            $this->status = $user->status;
            $this->isEdit = true;
        }
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset([
            'userId',
            'name',
            'email',
            'gender',
            'status',
            'isEdit',
        ]);
        $this->modal = false;
    }

    public function submit()
    {
        if (!$this->isEdit) {
            $this->validate([
                'name' => 'required',
                'email' => 'email',
                'gender' => 'required',
                'status' => 'required',
            ], [
                'name.required' => 'Name is required',
                'email.email' => 'Email address is invalid',
                'gender.required' => 'Gender is required',
                'status.required' => 'Status is required',
            ]);
        }

        // To update user
        if ($this->isEdit)
            $result = $this->editUser($this->userId, $this->only(['name', 'email', 'gender', 'status']));
        else
            $result = $this->createUser($this->only(['name', 'email', 'gender', 'status']));

        if ($result->failed()) {
            // Will return error until all requests are pass
            foreach ($result->json() as $res) {
                $this->addError($res['field'], $res['message']);
            }
        }

        $this->flash('success', 'Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'text' => 'User has been ' . ($this->isEdit ? 'updated' : 'created'),
        ], '/');
        $this->closeModal();
    }

    public function alertToDelete($id)
    {
        $this->alert('warning', 'Alert!', [
            'position' => 'center',
            'timer' => '',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'showCancelButton' => true,
            'onDismissed' => '',
            'text' => 'Confirm to delete this user?',
            'confirmButtonText' => 'Confirm',
            'onConfirmed' => 'confirmed',
            'data' => [$id],
        ]);
    }

    public function confirmed($data)
    {
        // $data['data'][0] = $userId;
        $result = $this->deleteUser($data['data'][0]);

        if ($result->failed()) {
            $this->alert('error', 'Failed!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'text' => 'Something went error',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->flash('success', 'Success', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
                'text' => 'User has been deleted',
            ], '/');
        }
    }

    public function render()
    {
        // It will call 'resources/views/livewire/manage-user.blade.php'
        return view('livewire.manage-user')
            ->slot('content');
    }
}
