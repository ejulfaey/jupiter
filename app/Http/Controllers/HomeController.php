<?php

namespace App\Http\Controllers;

use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Route;

class HomeController extends Controller
{

    use UserTrait;

    public function index()
    {
        $users = $this->getUser();
        // $users = [
        //     ['name' => 'Derol hakim', 'status' => 'active', 'gender' => 'male', 'email' => 'test@gmail.com'],
        //     ['name' => 'Derol hakim', 'status' => 'active', 'gender' => 'male', 'email' => 'test@gmail.com'],
        //     ['name' => 'Derol hakim2', 'status' => 'inactive', 'gender' => 'male', 'email' => 'test@gmail.com'],
        // ];

        return view('home', [
            'users' => $users
        ]);
    }
}
