<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait UserTrait
{

    public static $url = 'https://gorest.co.in/public/v2/users';

    public function getUser($query = []): array
    {
        return Http::withToken(env('GOREST_TOKEN'))
            ->get(self::$url, $query)
            ->throw()
            ->json();
    }

    public function createUser($query)
    {
        return Http::withToken(env('GOREST_TOKEN'))
            ->post(self::$url, $query);
    }

    public function editUser($query)
    {
        // 
    }

    public function deleteUser($query)
    {
        // 
    }
}
