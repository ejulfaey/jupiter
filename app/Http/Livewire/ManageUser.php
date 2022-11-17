<?php

namespace App\Http\Livewire;

use App\Traits\UserTrait;
use Illuminate\Support\Arr;
use Livewire\Component;

class ManageUser extends Component
{
    use UserTrait;

    public $users = [];
    public $perPage = 20;
    public $search;

    public function mount()
    {
        $query = [
            'per_page' => $this->perPage
        ];
        $this->users = $this->getUser($query);
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

    public function render()
    {
        return view('livewire.manage-user')
            ->slot('content');
    }
}
