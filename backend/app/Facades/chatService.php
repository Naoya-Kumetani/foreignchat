<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class chatService extends Facade
{
    protected static function getFacadeAccessor() {
        return 'chatService';
    }
}