<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait UserTrait
{

    public static $url = 'https://gorest.co.in/public/v2/users';

    public function getUser($query = [])
    {
        return Http::get(self::$url, $query)
            ->throw()
            ->json();
    }
}
