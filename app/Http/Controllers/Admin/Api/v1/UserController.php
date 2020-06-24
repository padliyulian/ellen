<?php

namespace App\Http\Controllers\Admin\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function index()
    {
        $users = $this->userService->userList();
        return $users;
    }
}
