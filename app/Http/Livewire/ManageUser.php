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
    public $perPage = 20;
    public $search;
    public $modal = false;
    public $isEdit = false;

    // Form parameter
    public $user;
    public $name;
    public $email;
    public $gender;
    public $status;

    public function mount()
    {
        $query = [
            'per_page' => $this->perPage
        ];
        $this->users = $this->getUser($query);
        // $this->users = [];
    }

    public function updatedPerPage($val)
    {
        $query = [
            'per_page' => $val
        ];

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

        $this->users = $this->getUser($query);
    }

    public function openModal($user = null)
    {
        if ($user) {
            $this->user = $user;
            $this->isEdit = true;
        }
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset([
            'user',
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
        if ($this->isEdit) {
        }
        // To create user
        else {

            // using `UserTrait::createUser` to send request
            $result = $this->createUser($this->only(['name', 'email', 'gender', 'status']));

            if ($result->failed()) {
                foreach ($result->json() as $res) {
                    $this->addError($res['field'], $res['message']);
                }
            }

            $this->closeModal();
            $this->flash('success', 'Success', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'text' => 'User has been created',
            ], '/');
        }
    }

    public function render()
    {
        return view('livewire.manage-user')
            ->slot('content');
    }
}
