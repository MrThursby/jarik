<?php

namespace App\Http\Controllers\Handle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Controllers\HandleController;

class VkController extends HandleController
{
    public function index(Request $request) {
        if($request->json('group_id') == env('VK_GROUP_ID') && $request->json('secret') == env("VK_SECRET")){
            $action = Str::camel($request->json('type'));
            if(method_exists(get_class($this), $action)){
                return call_user_func([$this, $action], $request);
            } else {
                return "Method not allowed";
            }
        } else {
            return "group_id or secret doesn't confirmed";
        }
    }

    public function confirmation() {
        return env("VK_CONFIRMATION_TOKEN");
    }

    public function messageNew(Request $request) {
        return "ok";
    }
}
